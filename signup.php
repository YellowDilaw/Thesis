<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- LINKS -->
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="figure.css">
	<!-- Latest compiled and minified CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Latest compiled JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	<title>SIGNUP</title>
</head>

<body>
<center>

	<img src="CATS.png" width="150" height="150">
	<div class="headtext" >SIGN UP</div>

	<form action="checksign.php" method="POST">
		<div class="form">
			<label class="input">
				  <input class="input__field" name="fullname" required="required" type="text" placeholder=" " />
				  <span class="input__label">Full Name</span><br>
			</label>
		</div>
		<div class="form">
			<label class="input">
				  <input class="input__field" name="email" required="required" placeholder=" " />
				  <span class="input__label">Email</span><br>
			</label>	
		</div>
		<div class="form">
		<label class="input" for="password">
        <input class="input__field" type="password" name="password" required="required" placeholder=" " />
        <span class="input__label">Password</span><br>
      </label>
		</div>
		<div class="form">
			<label class="input">
				  <input class="input__field" type="Password" name="cpass" required="required" placeholder=" " />
				  <span class="input__label">Confirm Password</span><br>
			</label>	
		</div>
		<div class="form">
			<label class="input">
				  <input class="input__field" name="orgname" required="required" placeholder=" " />
				  <span class="input__label">Organization Name</span><br>
			</label>	
		</div>
		<div class="form">
			<label class="input">
			  <input class="input__field" type="tel" id="phone" name="contact" required="required" pattern="\+63\d{10}" value="+63" placeholder=" " />
			  <span class="input__label">Contact Number</span><br>
			</label>
		</div>
		<br>
		<div class="form">
			<button class="round-butt" type="submit" value="verify"> Create Account </button>
		</div>
	</form>
	<br><br>
</center>
<script>
	document.addEventListener("DOMContentLoaded", function() {
	const phoneInput = document.getElementById("phone");
	const passwordInput = document.querySelector('input[name="password"]');
    const confirmPasswordInput = document.querySelector('input[name="cpass"]');
    const submitButton = document.querySelector('button[type="submit"]');

	phoneInput.addEventListener("keydown", function(event) {
		if (event.key === "Backspace" && phoneInput.value === "+63") {
		event.preventDefault(); 
		}
	});

    passwordInput.addEventListener("blur", function () {
      const password = passwordInput.value;
      const passwordIsValid = validatePassword(password);

      if (!passwordIsValid) {
        alert("Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one digit, and one special character.");
        passwordInput.value = ""; 
        submitButton.disabled = true;
      } else {
        submitButton.disabled = false;
      }
    });

    function validatePassword(password) {
      const minLength = 8;
      const uppercaseRegex = /[A-Z]/;
      const lowercaseRegex = /[a-z]/;
      const digitRegex = /\d/;
      const specialCharRegex = /[!@#$%^&*()_\-+=<>?]/;

      return (
        password.length >= minLength &&
        uppercaseRegex.test(password) &&
        lowercaseRegex.test(password) &&
        digitRegex.test(password) &&
        specialCharRegex.test(password)
      );
    }
  });
</script>
</body>
</html>