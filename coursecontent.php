<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "accountsdb";


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT id, content, 'text' AS type, lesson_num, module_name, created_at 
    FROM text_data 
    WHERE lesson_num = $lessonum AND module_name = '$module'
    UNION 
    SELECT id, filename AS content, 'file' AS type, lesson_num, module_name, created_at 
    FROM files 
    WHERE lesson_num = $lessonum AND module_name = '$module'
    ORDER BY created_at ASC");

    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($results) > 0) {
        foreach ($results as $row) {
            $content = $row["content"];
            $type = $row["type"];
            
            

            echo "<div>";
            if ($type === "text") {
                echo nl2br($content); // Display text content with line breaks
                echo "<br>";
                echo "<form method='post'>";
                echo "</form>";
            } elseif ($type === "file") {
                $fileExtension = strtolower(pathinfo($content, PATHINFO_EXTENSION));
                echo "<center>";
                if (in_array($fileExtension, ["jpg", "jpeg", "png", "gif"])) {
                    echo "<img src='uploads/" . $content . "' alt='" . $content . "' style='max-width: 400px;'><br>";
                } else {
                    echo "<a href='uploads/" . $content . "' target='_blank'>" . $content . "</a><br>";
                }
                
                echo "<form method='post'>";
                echo "<input type='hidden' name='file_id' value='{$row['id']}'>";
                echo "</form>";
                echo "</center>";
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