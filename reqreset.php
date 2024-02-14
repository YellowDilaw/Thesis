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
	<title>Verify from Email</title>
	
</head>
<body>


<center>
	<img src="CATS.png" width="150" height="150">
	<div class="headtext" >
		Reset your Password
	</div>


        <!-- ... (your existing HTML code) ... -->

        <form action="checkpass.php" method="POST">
            <div class="form">
                <label class="input">
                    <input class="input__field" name="email" required="required" type="text" placeholder=" " />
                    <span class="input__label">Email</span><br>
                </label>
            </div>

            <div class="form"><br>
                <button class="round-butt" type="submit" name="reset_password"> Send verification for password reset. </button>
            </div><br>
        </form>

        <div class="form">
            <a href="index.php">
                <button class="round-butt" type="submit"> Back to Home </button>
            </a>
        </div>
    </center>
</body>
</html>
