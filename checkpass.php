<?php
session_start();

$email = $_POST['email'];
if (empty($email)) {
    die("Verified Email is required.");
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

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


if ($result && mysqli_num_rows($result) == 1) {

    $_SESSION['email'] = $email;
    $activeEmail = $email;

    // Store the email in a cookie before destroying the session
    setcookie("temp_email", $email, time() + 3600, "/"); // Cookie expires in 1 hour

    session_destroy();

    require 'vendor/autoload.php'; // Include PHPMailer library

    if (isset($_POST['reset_password'])) {
        // Get the user's email address from the form
        $email = $_POST['email'];
    
        // Generate a unique token (you can use a library like random_bytes or uniqid)
        $token = uniqid();
    
        try {
            // Create a PHPMailer object
            $mail = new PHPMailer(true);
    
            // SMTP configuration
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'c3039371@gmail.com'; // Replace with your email address
            $mail->Password = 'ubml ooas fitl vinr'; // Replace with your email password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
    
            // Email content
            $mail->setFrom('c3039371@gmail.com', 'Admin'); // Replace with your name
            $mail->addAddress($email); // Add recipient email
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset';
            $mail->Body = "Click the following link to reset your password: <a href='http://localhost/thesis/newpass.php?token=$token'>Reset Password</a>";
    
            // Send the email
            $mail->send();
            echo 'Email sent successfully. Check your inbox for further instructions.';
            echo '<br>' . '<a href="index.php">Go back to Login </a>';
            
        } catch (Exception $e) {
            echo 'Email sending failed. Error: ' . $mail->ErrorInfo;
        }
    }
    
}
else {
    echo '<script>alert("Incorrect email or email is not verified!");</script>';
    echo '<script>window.location.assign("reqreset.php");</script>';
}

mysqli_close($con);
?>