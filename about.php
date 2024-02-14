<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
	<!-- Latest compiled and minified CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Latest compiled JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	<title>ABOUT</title>
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
		font-family: "Poppins", sans-serif;
	}

	.container {
	  max-width: 800px;
	  margin: 0 auto;
	  padding: 20px;
	}

	.section {
	  margin-top: 40px;
	  margin-bottom: 40px;
	}

	.section__title {
	  font-size: 24px;
	  font-weight: bold;
	  margin-bottom: 20px;
	}

	.section__content {
	  line-height: 1.5;
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
  <a href="http://localhost/thesis/home.php" class="navbar__item">HOME</a>
  <a href="http://localhost/thesis/courses.php" class="navbar__item">COURSES</a>
  <a href="http://localhost/thesis/about.php" class="navbar__item">ABOUT</a>
  <a href="logout.php" action="logout.php" method="POST" class="navbar__item navbar__item--logout">LOGOUT</a>  </nav>
  </div>
</div>

<!-- Header -->
<div class="header">
  <h2 class="header__title">ABOUT US</h2>
</div>

<!-- About Page -->
<div class="container">
  <div class="section">
    <h2 class="section__title">What is CATS?</h2>
    <div class="section__content">
      <p>CATS, short for Cybersecurity Awareness Training System, is a cutting-edge online platform meant to empower individuals and businesses with the information and skills essential to guard against cyber threats.</p>
    </div>
  </div>

  <div class="section">
    <h2 class="section__title">The Developers</h2>
    <div class="section__content">
      <p>We are a dedicated team of three passionate students of Mapua University pursuing our Bachelor of Science in Information Technology (BSIT). With a shared enthusiasm for technology and a strong desire to make a meaningful impact in the digital world, we have come together to create and manage this platform.</p>
    </div>
  </div>

  <div class="section">
    <h2 class="section__title">Contact Us</h2>
    <div class="section__content">
      <p>If you have any questions or feedback, feel free to reach out to us:</p>
      <ul>
        <li>Email: c3039371@gmail.com</li>
        <li>Address: Philippines</li>
      </ul>
    </div>
  </div>


<div class="section">
    <h2 class="section__title">References</h2>
    <div class="section__content">
	<p>This website has been created exclusively for academic and research purposes, specifically to support a thesis project. It is important to note that this site 
		does not generate any profit, and it is a non-monetized project.</p>
	<p>All content, including text, images, videos, and other multimedia elements, is used 
		solely for educational and research objectives. No commercial gains or monetary benefits are derived from this website.</p>
	<p>The content displayed here may include materials sourced from various references, the use of which is in compliance with 
		academic and fair use standards. These materials are the intellectual property of their respective owners.</p>
	<p>We would like to cite these following references for all the contents used for the learning materials on our courses: </p>
      <ul>
        <li>CompTia</li>
		<img src="comptia.png" width="100" height="100">
        <li>Coursera</li>
		<img src="coursera.png" width="100" height="100">
		<li>IBM</li>
		<img src="ibm.png" width="100" height="100">
      </ul>
    </div>
  </div>
</div>

</body>
</html>