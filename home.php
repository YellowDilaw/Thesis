<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<link type="text/css" rel="stylesheet" href="figure.css">
	<link type="text/css" rel="stylesheet" href="questionnaire.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,400;0,600;0,700;0,800;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
	<!-- Latest compiled and minified CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Latest compiled JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	<title>HOME</title>
  <style>
  
    .navbar {
      background-color: white;
      box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 10px 20px;
    }

    .navbarlogo img {
      vertical-align: middle;
    }

    .navbarmenu {
      display: flex;
      gap: 20px;
    }

    .navbaritem {
      color: black;
      text-decoration: none;
      padding: 10px;
    }

    .navbaritem:hover {
      background-color: #f1f1f1;
    }

    .navbar__item--logout:hover {
      color: red;
    }

	.rectangle-modbox {
	  padding-top: 50px;
	  padding-left: 50px;
	  margin-top:70px;
	  margin-left:70px;
    margin-bottom:30px;
	  margin-right:70px;
    width: 90%;   
    height: 350px;
	  border-radius: 15px;
    border: 1px solid #000000;  /* Add a border */
    background-color: #051D40;  /* Set the background color */
    display: inline-flex;
  }
	
	.homehead{
	  padding: 0px 100px 0px 0px;
	  font-family: "Poppins";
	  font-size: 40px;
	  font-weight: 700;
	  color: #051D40;
	}

	.homesubhead {
	  font-family: "Poppins";
	  font-size: 20px;
	  color: white;

	}
	.leftalign {
		text-align: left;
	}

  .leftalign2{
    text-align: left;
  }
	
	p{
		margin-left: 100px;
	}
	
	body,h1,h2,h3,h4,h5,h6 {
		font-family: "Poppins", 
		sans-serif
		}

  .percent{
    font-family: "Poppins";
	  font-size: 15px;
	  color: white;
  } 
  .rightalign{
    text-align: right;
  }   
	</style>
</head>

<body>

<!-- Navbar -->
<div class="con">
  <div class="navbar">
  <div class="navbarlogo">
    <img src="cat.png" alt="Logo" width="115" height="50">
  </div>
  <nav class="navbarmenu">
  <a href="http://localhost/thesis/home.php" class="navbaritem">HOME</a>
  <a href="http://localhost/thesis/courses.php" class="navbaritem">COURSES</a>
  <a href="http://localhost/thesis/about.php" class="navbaritem">ABOUT</a>
  <a href="logout.php" action="logout.php" method="POST" class="navbaritem navbar__item--logout">LOGOUT</a>
  </nav>
  </div>
</div>


<div class="rectangle-modbox">
  
  <div class="leftalign">
  
  <div class="homehead" style="color: white"> <img src="img/user.jpg" width="80" height="80">
  <?php 
  session_start();
	$db_name = "accountsdb"; 
	$db_username = "root"; 
	$db_pass = ""; 
	$db_host = "localhost"; 
  $con = mysqli_connect("$db_host","$db_username","$db_pass", "$db_name") 
	or die(mysqli_error()); //Connect to server

	$email = $_SESSION['email'];
	$query = mysqli_query($con, "SELECT * from users WHERE email ='$email'"); 
  $results = mysqli_fetch_array($query); // Fetches active email row
	
	echo $results['fullname'];

  
  ?>
  
  </div>
  <br>
  <div class="homesubhead">
  <?php 	
	echo $results['orgname'];
	  ?>
  <br>


  <?php 
	print 'CONTACT NO: ';
	echo $results['contact'];
	 ?>

  <br>
  
    <?php 
	print 'ID: ';
	print 'CATS';
	echo $results['id'];
	  ?>

  <br>


  <a href="certificates.php"> View Certificates </a>
	</div>
  </div>

  <div class="rightalign">
  <?php
    include('ongoing_prog.php');
  ?>
  </div>
  
  </div>
</div>

<div class="homehead pos">Recommended Modules</div>

<div class="pos">
<?php
include ('recommendation.php');
?>
</div>

<div class="homehead pos">On-Going Modules</div>
<div class="pos">

<?php
include ('ongoing.php');
?>

</div>  
<br><br>
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