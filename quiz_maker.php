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
	<title>QUIZ MAKER</title>
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
      padding: 10px 20px;
      border-radius: 5px;
      text-decoration: none;
      cursor: pointer;
      transition: background-color 0.3s ease;
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
<div class="header">
  <h2 class="header__title">QUIZ MAKER</h2>
</div>

<!-- Question Maker -->
<div class="container">
 <center>
  <div class="section">
    <form method="post" action="add_question.php">
        <label for="question_text">Insert Question Text:</label><br>
        <textarea id="question_text" name="question_text" rows="4" cols="50" required></textarea><br><br>
        
        <label for="options">Insert Question Options:</label><br>
        <input type="text" id="option1" name="option1" placeholder="Option 1" required><br><br>
        <input type="text" id="option2" name="option2" placeholder="Option 2" required><br><br>
        <input type="text" id="option3" name="option3" placeholder="Option 3" required><br><br>
        <input type="text" id="option4" name="option4" placeholder="Option 4" required><br><br>
        
        <label for="correct_option">Correct Option:</label><br>
        <input type="radio" id="correct_option1" name="correct_option" value="1" required>
        <label for="correct_option1">Option 1</label><br>
        <input type="radio" id="correct_option2" name="correct_option" value="2">
        <label for="correct_option2">Option 2</label><br>
        <input type="radio" id="correct_option3" name="correct_option" value="3">
        <label for="correct_option3">Option 3</label><br>
        <input type="radio" id="correct_option4" name="correct_option" value="4">
        <label for="correct_option4">Option 4</label><br><br>

		<label for="module">Module/Subject:</label><br>
        <select name="module" id="module" style="width: 100%; padding: 10px; margin: 5px 0; border: 2px solid #ccc; border-radius: 5px; background-color: #f4f4f4; font-size: 16px;">
			<option disabled selected></option>
			<option>Malware</option>
			<option>MITM</option>
			<option>Hacking</option>
			<option>Phishing</option>
		</select><br><br>

        <input id="addButton" type="submit" value="Add Question">
    </form>
  </div>
</center>
</div>
</body>
</html>