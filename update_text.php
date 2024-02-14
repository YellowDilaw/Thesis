<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "accountsdb";

if (isset($_POST["submit_edit_text"])) {
    $textID = $_POST["text_id"];
    $editedText = $_POST["edited_text"];

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Update the text content in the database
        $stmt = $conn->prepare("UPDATE text_data SET content = :edited_text WHERE id = :text_id");
        $stmt->bindParam(':edited_text', $editedText);
        $stmt->bindParam(':text_id', $textID);
        
        if ($stmt->execute()) {
            echo '<script >alert("Content is updated.");</script>';
            echo '<script>window.location = "javascript:history.back()";</script>';
            
        } else {
            echo "Error updating text content.";
        }

    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    $conn = null;
} else {
    echo "No data submitted for update.";
}
?>
<br>
<a href="/thesis/admin_courses.php">Back to Home</a>