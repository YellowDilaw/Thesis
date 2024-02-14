<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>Edit Text</title>
    <style>
        body {
            font-family: "Poppins", sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1000px;
            margin: 80px auto;
            padding: 20px;
            background-color: #051D40;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: white;
        }

        form {
            text-align: center;
        }

        textarea {
            width: 90%;
            padding: 10px;
            margin: 5px 5px 5px 5px;
            border: 2px solid #ccc;
            border-radius: 5px;
            background-color: #f4f4f4;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #FFFFFF;
            color: #051D40;
            border: none;
            font-size: 18px;
            padding: 10px 20px;
            margin-top: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #ccc;
        }

        a {
            display: block;
            text-align: center;
            margin: 20px 0 20px 0;
            text-decoration: none;
            color: white;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>EDIT CONTENT TEXT</h1>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "accountsdb";

        if (isset($_GET["id"])) {
            $textID = $_GET["id"];

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Fetch the text content based on the provided text ID
                $stmt = $conn->prepare("SELECT content FROM text_data WHERE id = :text_id");
                $stmt->bindParam(':text_id', $textID);
                $stmt->execute();

                $textRow = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($textRow) {
                    $content = $textRow["content"];
                    echo "<form method='post' action='update_text.php'>";
                    echo "<input type='hidden' name='text_id' value='$textID'>";
                    echo "<textarea name='edited_text' rows='8'>$content</textarea><br>";
                    echo "<input type='submit' value='Save Changes' name='submit_edit_text'>";
                    echo "</form>";
                } else {
                    echo "Text not found.";
                }
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }

            $conn = null;
        } else {
            echo "Text ID not provided.";
        }
        ?>
        <a href="javascript:window.location=document.referrer" style="text-align: center;">Back to Course</a>
        
    </div>

</body>
</html>