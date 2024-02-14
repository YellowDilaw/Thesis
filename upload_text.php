<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "accountsdb";

// Start the session
session_start();

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST["submit_text"])) {

        $textToUpload = $_POST["textToUpload"];
        $modnameToStore = $_POST["modname"];
        $lessonToStore = $_POST["lesson"];
        
        
        // Insert the uploaded text into the database
        $stmt = $conn->prepare("INSERT INTO text_data (lesson_num, module_name, content, user_id) VALUES (:lesson_num, :module_name, :content, 1)");
        $stmt->bindParam(':content', $textToUpload);
        $stmt->bindParam(':module_name', $modnameToStore);
        $stmt->bindParam(':lesson_num', $lessonToStore);
        
        if ($stmt->execute()) {
            echo "Text uploaded and saved to the database.";
        } else {
            echo "Error uploading text to the database.";
        }

    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
header('Location: /thesis/admin_'. $modnameToStore .'.php');
$conn = null;
?>