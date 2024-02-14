<?php
// Check if the id parameter is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Database connection parameters
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'accountsdb';

    // Create a database connection
    $conn = mysqli_connect($host, $username, $password, $database);

    if (!$conn) {
        die('Database connection failed: ' . mysqli_connect_error());
    }

    // SQL query to delete the user based on the id
    $query = "DELETE FROM users WHERE id = $id";

    // Execute the delete query
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die('Error deleting user: ' . mysqli_error($conn));
    }

    // Close the database connection
    mysqli_close($conn);

    // Redirect back to the user list page after deletion
    header("Location: userpage.php"); // Replace "users.php" with the actual user list page
    exit;
} else {
    echo "Invalid request"; // Handle invalid requests
}
?>
