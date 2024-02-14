<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "accountsdb";
// Starts the session
session_start();

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_SESSION['email'];
$query = mysqli_query($conn, "SELECT * from users WHERE email ='$email'"); 
$results = mysqli_fetch_array($query); // Fetches active email row

$user_id = $results['id'];

// Check the current value of phishing_prog
$sql = "SELECT phishing_prog FROM progress WHERE user_id = $user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $currentValue = $row['phishing_prog'];

    // Concatenate 3 to the current value
    $newValue = $currentValue . '3';

    // Update phishing_prog with the new concatenated value
    $sql = "UPDATE progress SET phishing_prog = '$newValue' WHERE user_id = $user_id";

    if ($conn->query($sql) === TRUE) {
        // Value updated successfully, send a response to JavaScript
        header('Location: /thesis/phishing.php');
    } else {
        // Error updating value, send a response to JavaScript
        echo "Error updating value: " . $conn->error;
    }
} else {
    // Insert a new row with phishing_prog = '3' and user_id if it doesn't exist
    $sql = "INSERT INTO progress (phishing_prog, user_id) VALUES ('3', $user_id)";
    
    if ($conn->query($sql) === TRUE) {
        header('Location: /thesis/phishing.php');
    } else {
        echo "Error creating new row: " . $conn->error;
    }
}

// Close the connection
$conn->close();
?>