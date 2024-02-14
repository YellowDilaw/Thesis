<?php
session_start();

$email = $_POST['email'];
$password = $_POST['password'];
$fullname = $_POST['fullname'];

if (empty($email) || empty($password)) {
    die("Email and password are required.");
}

$db_name = "accountsdb";
$db_username = "root";
$db_pass = "";
$db_host = "localhost";

// Create a connection
$con = mysqli_connect($db_host, $db_username, $db_pass, $db_name) or die(mysqli_error());

// Use a prepared statement to prevent SQL injection
$query = "SELECT * FROM users WHERE email = ? AND email_verified = 1";
$stmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($email === "admin" && $password === "B6;X6d|f7Qg0") {
    // Redirect to the admin page
    header("Location: http://localhost/thesis/userpage.php");
    exit;
}

if ($result && mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $table_password = $row['password'];
    $table_visited = $row['visited'];

    // Verify the password without encryption
    if ($password === $table_password) {
        $_SESSION['email'] = $email;
        $_SESSION['fullname'] = $fullname;

        if ($table_visited == 0) {
            $sql = "UPDATE users SET visited = '1' WHERE email = ?";
            $stmt = mysqli_prepare($con, $sql);
            mysqli_stmt_bind_param($stmt, "s", $email);
            if (mysqli_stmt_execute($stmt)) {
                echo "Record updated successfully.";
            } else {
                echo "Error updating record: " . mysqli_error($con);
            }
            header('Location: /thesis/questionnaire.php');
        } else {
            header('Location: /thesis/home.php');
        }
    } else {
        echo '<script>alert("Invalid email or password. Please try again.");</script>';
        echo '<script>window.location.assign("http://localhost/thesis/login.php");</script>';
    }
} else {
    echo '<script>alert("Incorrect email or email is not verified!");</script>';
    echo '<script>window.location.assign("http://localhost/thesis/login.php");</script>';
}

mysqli_close($con);
?>