<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "accountsdb";


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST["submit"])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if the file already exists
        if (file_exists($target_file)) {
            echo "Sorry, the file already exists.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        $allowedExtensions = ["doc", "docx", "ppt", "pptx", "xls", "xlsx", "pdf", "jpg", "jpeg", "png", "gif"];
        if (!in_array($fileType, $allowedExtensions)) {
            echo "Sorry, only Word, PowerPoint, Excel, PDF, and image files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $modnameToStore = $_POST["modname"];
                $lessonToStore = $_POST["lesson"];

                // File uploaded successfully, insert record into the database
                $filename = $_FILES["fileToUpload"]["name"];
                $stmt = $conn->prepare("INSERT INTO files (lesson_num, module_name, filename, user_id) VALUES (:lesson_num, :module_name, :filename, 1)");
                $stmt->bindParam(':filename', $filename);
                $stmt->bindParam(':module_name', $modnameToStore);
                $stmt->bindParam(':lesson_num', $lessonToStore);
                
                if ($stmt->execute()) {
                    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded and saved to the database.";
                } else {
                    echo "Error uploading file to the database.";
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
header('Location: /thesis/admin_'. $modnameToStore .'.php');
$conn = null;
?>