<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function redirectTo($url) {
    echo "<script>window.location.assign('$url');</script>";
    exit;
}

function sendVerificationEmail($email, $fullname, $verificationCode) {
    require 'vendor/autoload.php';

    $mailer = new PHPMailer(true);
    $mailer = new PHPMailer(true);
    $mailer = new PHPMailer(true);
    $mailer->SMTPDebug = 2; // Set to 2 for debugging
    $mailer->isSMTP();
    $mailer->Host = 'smtp.gmail.com';
    $mailer->SMTPAuth = true;
    $mailer->Username = 'c3039371@gmail.com';
    $mailer->Password = 'ubml ooas fitl vinr';
    $mailer->SMTPSecure = 'tls'; // Change to 'ssl' if needed
    $mailer->Port = 587; // Change to 465 if using 'ssl'
    $mailer->setFrom('c3039371@gmail.com', 'Admin');
    $mailer->addAddress($email, $fullname);
    $mailer->Subject = 'Email Verification';
    $mailer->Body = 'Your verification code is: ' . $verificationCode;

    try {
        // Send email
        $mailer->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $orgname = $_POST['orgname'];
    $password = $_POST['password'];
    $contact = $_POST['contact'];
    $cpass = $_POST['cpass'];

    $db_name = "accountsdb";
    $db_username = "root";
    $db_pass = "";
    $db_host = "localhost";
    
    $con = mysqli_connect($db_host, $db_username, $db_pass, $db_name);
    if (!$con) {
        die("Database connection error: " . mysqli_connect_error());
    }

    // Validate the email address
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<script>alert("Invalid email address!");</script>';
        redirectTo("http://localhost/thesis/signup.php");
    }

    // Check if email is already registered
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    
    if (mysqli_stmt_num_rows($stmt) > 0) {
        echo '<script>alert("Email has already been registered!");</script>';
        redirectTo("http://localhost/thesis/signup.php");
    }

    // Generate a random verification code
    $verificationCode = mt_rand(100000, 999999);

    if ($password === $cpass) {
        // Insert user data into the database using prepared statement
        $insertQuery = "INSERT INTO users (fullname, email, orgname, password, contact, verification_code) VALUES (?, ?, ?, ?, ?, ?)";
        $insertStmt = mysqli_prepare($con, $insertQuery);
        mysqli_stmt_bind_param($insertStmt, "ssssss", $fullname, $email, $orgname, $password, $contact, $verificationCode);
        
        if (mysqli_stmt_execute($insertStmt)) {
            if (sendVerificationEmail($email, $fullname, $verificationCode)) {
                echo '<script>alert("A verification code has been sent to your email.");</script>';
                redirectTo("http://localhost/thesis/verify.php?email=" . urlencode($email));
            } else {
                echo '<script>alert("Failed to send the verification code. Please try again later.");</script>';
                redirectTo("http://localhost/thesis/signup.php");
            }
        } else {
            echo '<script>alert("Failed to register. Please try again later.");</script>';
            redirectTo("http://localhost/thesis/signup.php");
        }
    } else {
        echo '<script>alert("Password did not match! Try again.");</script>';
        redirectTo("http://localhost/thesis/signup.php");
    }
    
    mysqli_close($con);
}
?>