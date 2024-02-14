<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        /* Your CSS styles here */
        /* CSS styles for the delete and edit buttons */
        .delete-button-container {
            display: inline-block; /* Display buttons in a row */
            margin-right: 10px; /* Add margin to separate buttons */
        }

        .delete-button {
            background-color: #c30010;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .edit-button {
            background-color: #051D40;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .file-link {
            color: #007bff; /* Blue text color for file links */
            text-decoration: none; /* Remove underline from file links */
        }
    </style>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "accountsdb";

// Function to delete a file from the server
function deleteFile($filename) {
    if (file_exists("uploads/" . $filename)) {
        unlink("uploads/" . $filename);
    }
}

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Handle file deletion
    if (isset($_POST["delete_file"])) {
        $fileID = $_POST["file_id"];

        // Get the filename associated with the file ID
        $stmt = $conn->prepare("SELECT filename FROM files WHERE id = :file_id");
        $stmt->bindParam(':file_id', $fileID);
        $stmt->execute();
        $fileRow = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($fileRow) {
            $filename = $fileRow["filename"];

            // Delete the file from the server
            deleteFile($filename);

            // Delete the file record from the database
            $stmt = $conn->prepare("DELETE FROM files WHERE id = :file_id");
            $stmt->bindParam(':file_id', $fileID);
            $stmt->execute();
        }
    }

    // Handle text deletion
    if (isset($_POST["delete_text"])) {
        $textID = $_POST["text_id"];

        // Delete the text record from the database
        $stmt = $conn->prepare("DELETE FROM text_data WHERE id = :text_id");
        $stmt->bindParam(':text_id', $textID);
        $stmt->execute();
    }
    
    // Fetch and display uploaded content (text and files interleaved by creation time)
    $stmt = $conn->prepare("SELECT id, content, 'text' AS type, lesson_num, module_name, created_at 
    FROM text_data 
    WHERE module_name = '$module'
    UNION 
    SELECT id, filename AS content, 'file' AS type, lesson_num, module_name, created_at 
    FROM files 
    WHERE module_name = '$module'
    ORDER BY created_at ASC");
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($results) > 0) {
        foreach ($results as $row) {
            $content = $row["content"];
            $type = $row["type"];

            echo "<div><br>";
            if ($type === "text") {
                echo nl2br(htmlspecialchars($content)); // Display text content with line breaks
                echo "<br>";
                echo "<div class='delete-button-container'>";
                echo "<form method='post'>";
                echo "<input type='hidden' name='text_id' value='{$row['id']}'>";
                echo "<button class='delete-button' type='submit' name='delete_text'>Delete</button>";
                echo "</form>";
                echo "</div>";
                echo "<a href='edit_text.php?id={$row['id']}' class='edit-button'>Edit</a>"; // Edit button for text
                
            } elseif ($type === "file") {
                $fileExtension = strtolower(pathinfo($content, PATHINFO_EXTENSION));
                if (in_array($fileExtension, ["jpg", "jpeg", "png", "gif"])) {
                    echo "<br><img src='uploads/" . $content . "' alt='" . $content . "' style='max-width: 400px; margin-bottom: 10px'><br>";
                } else {
                    echo "<br><a href='uploads/" . $content . "' target='_blank' class='file-link'>" . $content . "</a><br>";
                }
                echo "<div class='delete-button-container'>";
                echo "<form method='post'>";
                echo "<input type='hidden' name='file_id' value='{$row['id']}'>";
                echo "<button class='delete-button' type='submit' name='delete_file'>Delete</button>";
                echo "</form>";
                echo "</div>";
            }
            echo "</div>";
        }
        
    } else {
        echo "<h2>No content uploaded yet.</h2>";
    }
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$conn = null;
?>
</body>
</html>