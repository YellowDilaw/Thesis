<?php
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the necessary form fields are set
    if (isset($_POST["id"], $_POST["fullname"], $_POST["q1"], $_POST["q2"], $_POST["q3"], $_POST["q4"])) {
        $id = $_POST["id"];
        $fullname = $_POST["fullname"];
        $q1 = $_POST["q1"];
        $q2 = $_POST["q2"];
        $q3 = $_POST["q3"];
        $q4 = $_POST["q4"];

        $q1 = (int)$q1;
        $q2 = (int)$q2;
        $q3 = (int)$q3;
        $q4 = (int)$q4;
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

        // SQL query to update the user's data based on the id
        $query = "UPDATE users SET fullname = '$fullname', q1 = '$q1', q2 = '$q2', q3 = '$q3', q4 = '$q4' WHERE id = $id";

        // Execute the update query
        $result = mysqli_query($conn, $query);

        if (!$result) {
            die('Error updating user data: ' . mysqli_error($conn));
        }

        // Close the database connection
        mysqli_close($conn);

        // Redirect back to the user list page after update
        header("Location: userpage.php"); // Replace "users.php" with the actual user list page
        exit;
    } else {
        echo "Invalid form data"; // Handle invalid form data
    }
} else {
    echo "Invalid request"; // Handle invalid requests
}
?>
