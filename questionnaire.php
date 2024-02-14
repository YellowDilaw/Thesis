<?php
			session_start();
			$servername = "localhost";
			$username = "root";
			$password = "";
			$database = "accountsdb";
			
			$con = new mysqli($servername, $username, $password, $database);
			if ($con->connect_error) 
			{
				die("Connection failed: " . $con->connect_error);
			} // Connect to server
			
			// Get the email from the form
			$email = $_SESSION['email'];
			
			$sql = "SELECT * FROM users WHERE email = '$email'"; // Replace with your specific query
			$result = $con->query($sql); // Fetches email
		?>

<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- LINKS -->
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="CATSTYLE.css">
	<!-- Latest compiled and minified CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Latest compiled JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	<title>QUESTIONNAIRE</title>
	<style>
    .popup {
	  display: none;
	  position: fixed;
	  top: 0;
	  left: 0;
	  width: 100%;
	  height: 100%;
	  background-color: rgba(0, 0, 0, 0.5);
	  z-index: 9999;
	}

	.popup-content {
	  display: flex;
	  flex-direction: column;
	  align-items: center;
	  justify-content: flex-start; /* Updated to top center */
	  background-color: #fff;
	  width: 600px;
	  height: 400px;
	  margin: 100px auto;
	  padding: 20px;
	  border-radius: 5px;
	  position: relative; 
	}

	.popup-close {
	  align-self: flex-end;
	  cursor: pointer;
	  position: absolute; 
	  top: 10px;
	  right: 10px; 
	}

	.popup-button {
	  margin-top: auto;
	}
	
	#openButton{
	  margin: 0 0 50px 0;
	}

  </style>
</head>

<body>
<center>
	<img src="CATS.png" width="150" height="150">
	<div class="head">
		<h2 class="head-quest">QUESTIONNAIRE</h2>
		<p class="pq">Answer the following questions to receive the modules recommended for you.</p>
	</div>
	
	<form action="checkquest.php" method="POST">
		<div class="q1">
		<h3>QUESTION 1</h3>
			<h5>Have you ever used an open Wi-Fi network or connected to an unsecure website without using encryption or secure connections to send data?</h5>
			<div class="form-check form-check-inline">
			  <input type="radio" class="form-check-input" id="radio1" name="q1group" value="1" required>
			  <label class="form-check-label" for="radio1">YES</label>
			</div>
			<div class="form-check form-check-inline">
			  <input type="radio" class="form-check-input" id="radio2" name="q1group" value="0">
			  <label class="form-check-label" for="radio2">NO</label>
			</div>
		</div>
		<br>
		<div class="q2">
		<h3>QUESTION 2</h3>
			<h5>Have you ever linked a personal device, such as a USB drive or smartphone, to your work computer without considering the risks?</h5>
			<div class="form-check form-check-inline">
			  <input type="radio" class="form-check-input" id="radio3" name="q2group" value="1" required>
			  <label class="form-check-label" for="radio3">YES</label>
			</div>
			<div class="form-check form-check-inline">
			  <input type="radio" class="form-check-input" id="radio4" name="q2group" value="0">
			  <label class="form-check-label" for="radio4">NO</label>
			</div>
		</div>
		<br>
		<div class="q3">
		<h3>QUESTION 3</h3>
			<h5>Have you ever gotten an unsolicited email or message from someone you don't know?</h5>
			<div class="form-check form-check-inline">
			  <input type="radio" class="form-check-input" id="radio5" name="q3group" value="1" required>
			  <label class="form-check-label" for="radio5">YES</label>
			</div>
			<div class="form-check form-check-inline">
			  <input type="radio" class="form-check-input" id="radio6" name="q3group" value="0">
			  <label class="form-check-label" for="radio6">NO</label>
			</div>
		</div>
		<br>
		<div class="q4">
		<h3>QUESTION 4</h3>
			<h5>Have you ever detected unusual or unexpected changes to your online accounts, such as unauthorized logins or account settings modifications?</h5>
			<div class="form-check form-check-inline">
			  <input type="radio" class="form-check-input" id="radio7" name="q4group" value="1" required>
			  <label class="form-check-label" for="radio7">YES</label>
			</div>
			<div class="form-check form-check-inline">
			  <input type="radio" class="form-check-input" id="radio8" name="q4group" value="0">
			  <label class="form-check-label" for="radio8">NO</label>
			</div>
		</div>
		<br>
		<?php
						if ($result->num_rows > 0) 
						{
							while ($row = $result->fetch_assoc()) 
							{
								// Access the specific columns you fetched
								$q1 = $row["q1"];
								$q2 = $row["q2"];
								$q3 = $row["q3"];
								$q4 = $row["q4"];

								// Check if the column value is equal to 1
								if ($q1 == 1) 
								{
									// Print HTML code if the condition is met
									echo "<li> MITM Attack </li>";
								}
								if ($q2 == 1) 
								{
									echo "<li> Malware </li>";
								}
								if ($q3 == 1) 
								{
									echo "<li> Phishing </li>";
								}
								if ($q4 == 1) 
								{
									echo "<li> Hacking </li>";
								}
							}
						} else {
							echo "No results found";
						}

						$con->close();
					?>
		<button id="openButton" class="round-butt" type="submit" value="" disabled>Submit</button>
		<div id="popup" class="popup">
			<div class="popup-content">
				<span id="closeButton" class="popup-close">X</span>
				<h2 style="margin-top:15px">NOTICE</h2>
				<img src="notice.png" style="width: 60px; height: 60px;">
				<div style="margin: 50px 0 50px 0">
				<p style="font-size: 20px;">Upon proceeding, you will not be able to change your answers.</p>
				<h6>The recommended modules will appear on your home page.</h6>
				<br>
				<button id="popupButton" class="round-butt" type="submit" value="">Proceed</button>
				</div>
			</div>
		</div>

	</form>

</center>
</body>
<script>
		// Get the elements
		const openButton = document.getElementById('openButton');
		const popup = document.getElementById('popup');
		const closeButton = document.getElementById('closeButton');
		const popupButton = document.getElementById('popupButton');

		// Function to open the popup
		function openPopup() {
			popup.style.display = 'block';
		}

		// Function to close the popup
		function closePopup() {
			popup.style.display = 'none';
		}

		// Add click event listeners
		openButton.addEventListener('click', function (event) {
			if (isFormValid()) {
				openPopup();
				event.preventDefault(); // Prevent form submission
			}
		});

		closeButton.addEventListener('click', closePopup);

		// Prevent click event propagation from the popup button
		popupButton.addEventListener('click', function (event) {
			event.stopPropagation();
		});
		

		// Add change event listener to radio buttons
		const radioButtons = document.querySelectorAll('input[type="radio"]');
		radioButtons.forEach((radio) => {
			radio.addEventListener('change', handleRadioChange);
		});

		// Function to handle radio button change
		function handleRadioChange() {
			if (isFormValid()) {
				openButton.disabled = false;
				popupButton.disabled = false;
			} else {
				openButton.disabled = true;
				popupButton.disabled = true;
			}
		}

		// Function to check if the form is valid
		function isFormValid() {
			const form = document.querySelector('form');
			return form.checkValidity();
		}

</script>


</html>