<?php
$email = ''; // Initialize the $email variable

if (isset($_GET['email'])) {
    $email = urldecode($_GET['email']); // Get the email from the URL parameter
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enteredCode = ($_POST['verification_code']);
    $email = ($_POST['email']);
    $db_name = "accountsdb";
    $db_username = "root";
    $db_pass = "";
    $db_host = "localhost";
    $con = mysqli_connect("$db_host", "$db_username", "$db_pass", "$db_name") or
        die(mysqli_error()); // Connect to the server

    // Check if the entered code matches the stored code in the database
    $query = "SELECT * FROM users WHERE email = '$email' AND verification_code = '$enteredCode'";
    $result = mysqli_query($con, $query);
    
    echo "Email from URL: " . htmlspecialchars($_GET['email']) . ", Entered Code: $enteredCode";

    if (mysqli_num_rows($result) == 1) {
        // Code matches, mark the email as verified
        mysqli_query($con, "UPDATE users SET email_verified = 1 WHERE email = '$email'");
        echo '<script>alert("Email verification successful! You can now login.");</script>';
        echo '<script>window.location.assign("http://localhost/thesis/index.php");</script>';
    } else {
        echo '<script>alert("Invalid verification code. Please try again.");</script>';
        echo '<script>window.location.assign("http://localhost/thesis/verify.php");</script>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- LINKS -->
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,400;0,600;0,700;0,800;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
	<!-- Latest compiled and minified CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Latest compiled JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	<link type="text/css" rel="stylesheet" href="figure.css">
	<title>Email Verification</title>
</head>
<body>

<center>
	<img src="CATS.png" width="150" height="150">
	<div class="headtext" >
		Email Verification
	</div>

    <form method="POST" action="">
        <label for="verification_code" style="font-size: 18px">Enter the verification code sent to your email:</label><br><br>
            <input class="input__field" type="text" name="verification_code" required>
            <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>"><br>
        <button class="round-butt" type="submit">Verify</button>
    </form>
</center>
</body>
</html>