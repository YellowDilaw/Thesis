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

// Check the current value of hacking_prog
$sql = "SELECT hacking_prog FROM progress WHERE user_id = $user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $currentValue = $row['hacking_prog'];

    // Concatenate 1 to the current value
    $newValue = $currentValue . '1';

    // Update hacking_prog with the new concatenated value
    $sql = "UPDATE progress SET hacking_prog = '$newValue' WHERE user_id = $user_id";

    if ($conn->query($sql) === TRUE) {
        // Value updated successfully, send a response to JavaScript
        header('Location: /thesis/hacking.php');
    } else {
        // Error updating value, send a response to JavaScript
        echo "Error updating value: " . $conn->error;
    }
} else {
    // Insert a new row with hacking_prog = '1' and user_id if it doesn't exist
    $sql = "INSERT INTO progress (hacking_prog, user_id) VALUES ('1', $user_id)";
    
    if ($conn->query($sql) === TRUE) {
        header('Location: /thesis/hacking.php');
    } else {
        echo "Error creating new row: " . $conn->error;
    }
}

// Close the connection
$conn->close();
?>