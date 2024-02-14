<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['email'])) {
    $email = $_GET['email'];
    $password = $_POST['password'];
    $cpass = $_POST['cpass'];

    $db_name = "accountsdb";
    $db_username = "root";
    $db_pass = "";
    $db_host = "localhost";

    $con = mysqli_connect($db_host, $db_username, $db_pass, $db_name);
    if (!$con) {
        die("Database connection error: " . mysqli_connect_error());
    }

    if ($password === $cpass) {
        // Update user's password in the database using prepared statement
        $updateQuery = "UPDATE users SET password = ? WHERE email = ?";
        $updateStmt = mysqli_prepare($con, $updateQuery);
        mysqli_stmt_bind_param($updateStmt, "ss", $password, $email);

        if (mysqli_stmt_execute($updateStmt)) {
            echo '<script>alert("Password updated successfully."); window.location.href = "index.php";</script>';
        } else {
            echo 'Password update failed. Error: ' . mysqli_error($con);
        }
    } else {
        echo '<script>alert("Password did not match! Try again.");  window.location.href = "index.php";</script>';
        
    }

    mysqli_close($con);
} else {
    echo "Invalid request.";
}
?>
