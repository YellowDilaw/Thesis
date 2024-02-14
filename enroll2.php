<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "accountsdb";

// Start the session
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

// SQL query to check if table one's X column has a row with '1'
$sql = "SELECT * FROM courses WHERE user_id = $user_id";
$result = $conn->query($sql);

// Get the user's ID from the session
if($result->num_rows > 0){
    $user_id = $results['id'];

    // Update Course2 column with '1' and the user_id
    $sql = "UPDATE courses SET Course2 = 1, user_id = $user_id WHERE user_id = $user_id";

    if ($conn->query($sql) === TRUE) {
        // Course enrolled successfully, send a response to JavaScript
        header('Location: /thesis/home.php');
    } else {
        // Error enrolling course, send a response to JavaScript
        echo "error";
    }
} else {

    // Insert a new row with Course2 = 1 and user_id
    $sql = "INSERT INTO courses (Course2, user_id) VALUES (1, $user_id)";
    
    if ($conn->query($sql) === TRUE) {
        header('Location: /thesis/home.php');
    } else {
        echo "Error creating new row: " . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
