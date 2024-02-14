<?php
session_start();

$db_name = "accountsdb"; 
$db_username = "root"; 
$db_pass = ""; 
$db_host = "localhost"; 
$con = mysqli_connect("$db_host","$db_username","$db_pass", "$db_name") 
or die(mysqli_error()); //Connect to server

// Get the email from the cookie
if (isset($_COOKIE['temp_email'])) {
    $email = $_COOKIE['temp_email'];
    // Remove the temporary email cookie
    setcookie("temp_email", "", time() - 3600, "/");
} else {
    // Handle the case where the email cookie is not set
    echo "Email cookie is missing.";
    exit;
}

$query = mysqli_query($con, "SELECT * from users WHERE email ='$email'"); 
$results = mysqli_fetch_array($query); // Fetches active email row

// Check if the token is present in the URL
if (isset($_GET['token'])) {
    // Get the token from the URL
    $token = $_GET['token'];
    
if (isset($_GET['email'])) {
    $email = $_GET['email'];
}

?>

    <!DOCTYPE html>
    <html lang="en">
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
	
        <title>Password Reset</title>
    </head>
    <body>

    <center>
    <img src="CATS.png" width="150" height="150">
	<div class="headtext" >
		Reseting Password for <br>
    <?php
    echo $email;
    ?>
	</div>

            <form action="checknewpass.php?email=<?php echo $email; ?>" method="POST">
                <input type="hidden" name="token" value="<?php echo $token; ?>">
            <div class="form">
                <label class="input">
                    <input class="input__field" type="password" name="password" required="required" placeholder=" " />
                    <span for="new_password" class="input__label">New Password</span>
                </label>	
            </div>
            <br>
            <div class="form">
			    <label class="input">
				  <input class="input__field" type="Password" name="cpass" required="required" placeholder=" " />
				  <span for="confirm_new_password" class="input__label">Confirm new Password</span><br>
			    </label>	
		    </div>

                <div class="form"><br>
		<button class="round-butt" type="submit" value="ChangerPass"> Change Password </button>
		</div><br>
	</form>

        </center>
    </body>
    </html>
    <?php
} else {
    echo "Invalid token. Please request a new password reset link.";
}
?>
