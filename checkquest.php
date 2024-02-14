<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "accountsdb";
    

    try 
    {
        // Create a PDO connection
        $con = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        // Set the PDO error mode to exception
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Get the email from the form
        $email = $_SESSION['email'];

        // Get the values from the form submission
        $q1 = $_POST['q1group'];
        $q2 = $_POST['q2group'];
        $q3 = $_POST['q3group'];
        $q4 = $_POST['q4group'];

        // Construct the SQL query
        $sql = "UPDATE users SET q1 = :q1, q2 = :q2, q3 = :q3, q4 = :q4 WHERE email = :email";

        // Prepare the statement
        $stmt = $con->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':q1', $q1);
        $stmt->bindParam(':q2', $q2);
        $stmt->bindParam(':q3', $q3);
        $stmt->bindParam(':q4', $q4);
        $stmt->bindParam(':email', $email);
        //$stmt->bindParam("iiiis", $q1, $q2, $q3, $q4, $email);

        // Execute the statement
        $stmt->execute();

        header('Location: /thesis/home.php');
    } 
    catch (PDOException $e) 
    {
        echo "Error updating record: " . $e->getMessage();
    }

    // Close the connection
    $con = null;
?>