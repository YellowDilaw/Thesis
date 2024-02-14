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
	<title>File Upload and Text Input</title>
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

    #addButton{
        background-color: #051D40;
        color: white;
        border: none;
        font-size: 18px;
        padding: 5px;
    	margin-top: 10px;
        margin-bottom: 20px;
    }

	#addButton:hover {
		background-color: #032135;
	}

	input[type="text"],
	textarea {
		width: 100%;
		padding: 10px;
		margin: 5px 0;
		border: 2px solid #ccc;
		border-radius: 5px;
		background-color: #f4f4f4;
		font-size: 16px;
	}

	input[type="radio"] {
		margin-right: 5px;
	}
    /* Add a CSS class to style the table cells */
    .table-bordered tr{
        border: 1px solid #ccc; /* Add a border to each cell */
        padding: 5px; /* Add padding for spacing */
    }
    .indented {
    margin-left: 20px; /* Adjust the value as needed */
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
    <a href="http://localhost/thesis/content_maker.php" class="navbar__item">Create Content</a>
    <a href="http://localhost/thesis/quiz_maker.php" class="navbar__item">QUIZ</a>
    <a href="logout.php" action="logout.php" method="POST" class="navbar__item navbar__item--logout">LOGOUT</a>  
  </nav>
  </div>
</div>

<!-- Header -->
<div class="header">
  <h2 class="header__title">Content Maker</h2>
</div>

<div class="container">

    <h1>Upload Files</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Select File to Upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload File" name="submit">
    </form>

    <h1>Upload Text</h1>
    <form action="upload_text.php" method="post">
        <textarea name="textToUpload" rows="4" cols="50"></textarea><br>
        <input type="submit" value="Upload Text" name="submit_text">
    </form>

    <h2>Uploaded Contents:</h2>
    <?php
    // Display uploaded files from the database
    require_once 'display.php';
    ?>

  </div>
</center>
</div>
</body>
</html>