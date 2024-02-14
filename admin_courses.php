<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="coursesss.css">
	<script src="scripts.js"></script>
	<!-- Latest compiled and minified CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Latest compiled JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

	<title>COURSES</title>
	<style>
	.navbar {
	  background-color: white;
	  box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
	  display: flex;
	  align-items: center;
	  justify-content: space-between;
	  padding: 10px 20px;
	}

	.navbar__logo img {
	  vertical-align: middle;
	}

	.navbar__menu {
	  display: flex;
	  gap: 20px;
	}

	.navbar__item {
	  color: black;
	  text-decoration: none;
	  padding: 10px;
	}

	.navbar__item:hover {
	  background-color: #f1f1f1;
	}

	.navbar__item--logout:hover {
	  color: red;
	}

    body,h1,h2,h3,h4,h5,h6 {
        font-family: "Poppins", 
        sans-serif
        }

	.searchbox .search-container {
	float: left;
	}

	.searchbox input[type=text] {
	padding: 6px;
	width: 1070px;
	height: 60px;
	margin-top: 15px;
	margin-bottom: 20px;
	font-size: 17px;
	border: none;
	border-radius: 10px 0px 0px 10px;
	}

	.searchbox .search-container button {
	float: right;
	border-radius: 0px 10px 10px 0px;
	padding: 6px 10px;
	margin-top: 15px;
	margin-right: 16px;
	background: #ddd;
	font-size: 32px;
	border: none;
	cursor: pointer;
	}

	.searchbox .search-container button:hover {
	background: #ccc;
	}

	@media screen and (max-width: 600px) {
	.searchbox .search-container {
		float: none;
	}
	.searchbox a, .searchbox input[type=text], .searchbox .search-container button {
		float: none;
		display: block;
		text-align: left;
		width: 100%;
		margin: 0;
		padding: 14px;
	}
	.searchbox input[type=text] {
		border: 1px solid #ccc;  
	}
	}

	.header {
		background-color: #051D40;
		text-align: center;
		padding: 99px 0;
	}

	.header__title {
		color: white;
		font-size: 24px;
		font-weight: bold;
	}
	
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

	#popup {
	display: none;
	position: fixed;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
	padding: 10px;
	background-color: #fff;
	border: 1px solid #ccc;
	box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
	}

	#openButton{
	  margin: 0 0 50px 0;
	}
	
    </style>

</head>
<body>

<!-- Navbar -->
<div class="con">
  <div class="navbar">
  <div class="navbar__logo">
    <img src="cat.png" alt="Logo" width="115" height="50">
  </div>
  <nav class="navbar__menu">
    <a href="http://localhost/thesis/userpage.php" class="navbar__item">USERS</a>
    <a href="http://localhost/thesis/admin_courses.php" class="navbar__item">CREATE CONTENT</a>
    <a href="http://localhost/thesis/quiz_maker.php" class="navbar__item">QUIZ MAKER</a>
    <a href="logout.php" action="logout.php" method="POST" class="navbar__item navbar__item--logout">LOGOUT</a>  
  </nav>
  </div>
</div>

<!-- Header -->
<div class = "header">
<h2 class="header__title">EDIT COURSE CONTENT</h2>
</div>

<div class="pos">

	<div class="modbox"> 
		<div class="modbox-img">
			<a href="admin_MITM.php">
			<img src="MITM.png" alt="Example Image">
		</div>
		<figcaption>MITM ATTACK</figcaption>
		</a>
	</div>

	<div class="modbox"> 
		<div class="modbox-img">
			<a href="admin_malware.php">
			<img src="malw.png" alt="Example Image">
		</div>
		<figcaption>MALWARE</figcaption>
		</a>
	</div>
	
	<div class="modbox"> 
		<div class="modbox-img">
			<a href="admin_phishing.php">
			<img src="phish.jpeg" alt="Example Image">
		</div>
		<figcaption>PHISHING</figcaption>
		</a>
	</div>

	<div class="modbox"> 
		<div class="modbox-img">
			<a href="admin_hacking.php">
			<img src="hack.jpg" alt="Example Image">
		</div>
		<figcaption>HACKING</figcaption>
		</a>
	</div>

</div>

</body>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</html>