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
	<title>Edit User Data</title>
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
    <a href="http://localhost/thesis/users.php" class="navbar__item">USERS</a>
    <a href="http://localhost/thesis/courses.php" class="navbar__item">COURSES</a>
    <a href="http://localhost/thesis/quiz_maker.php" class="navbar__item">QUIZ</a>
    <a href="logout.php" action="logout.php" method="POST" class="navbar__item navbar__item--logout">LOGOUT</a>  
  </nav>
  </div>
</div>

<!-- Header -->
<div class="header">
  <h2 class="header__title">Edit User Data</h2>
</div>

<div class="container">
 <center>
<?php
// Check if the id parameter is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Database connection parameters
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'accountsdb';

    // Create a database connection
    $conn = mysqli_connect($host, $username, $password, $database);

    if (!$conn) {
        die('Database connection failed: ' . mysqli_connect_error());
    }

    // SQL query to fetch the user based on the id
    $query = "SELECT fullname, email, q1, q2, q3, q4 FROM users WHERE id = $id";

    // Execute the query
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die('Error fetching user data: ' . mysqli_error($conn));
    }

    // Check if the user exists
    if (mysqli_num_rows($result) > 0) {
        // Fetch user data
        $row = mysqli_fetch_assoc($result);

        // Display a form for editing the user's data
        // You can customize this form according to your needs
        echo '<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
    <form method="POST" action="update.php">
        <input type="hidden" name="id" value="' . $id . '">
        <label for="fullname">Full Name:</label>
        <input type="text" name="fullname" id="fullname" value="' . $row['fullname'] . '"><br>
        <label for="q1">MITM:</label><br>
        <select name="q1" id="q1">
            <option value=1 <?php if ($row[\'q1\'] == 1) echo \'selected\'; ?>1</option>
            <option value=0 <?php if ($row[\'q1\'] == 0) echo \'selected\'; ?>0</option>
        </select><br><br>
        
        <label for="q2">Malware:</label><br>
        <select name="q2" id="q2">
            <option value=1 <?php if ($row[\'q2\'] == 1) echo \'selected\'; ?>1</option>
            <option value=0 <?php if ($row[\'q2\'] == 0) echo \'selected\'; ?>0</option>
        </select><br><br>
        
        <label for="q3">Phishing:</label><br>
        <select name="q3" id="q3">
            <option value=1 <?php if ($row[\'q3\'] == 1) echo \'selected\'; ?>1</option>
            <option value=0 <?php if ($row[\'q3\'] == 0) echo \'selected\'; ?>0</option>
        </select><br><br>
        
        <label for="q4">Hacking:</label><br>
        <select name="q4" id="q4">
            <option value=1 <?php if ($row[\'q4\'] == 1) echo \'selected\'; ?>1</option>
            <option value=0 <?php if ($row[\'q4\'] == 0) echo \'selected\'; ?>0</option>
        </select><br><br><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>';

        // Close the database connection
        mysqli_close($conn);
    } else {
        echo "User not found"; // Handle user not found
    }
} else {
    echo "Invalid request"; // Handle invalid requests
}
?>

  </div>
</center>
</div>
</body>
</html>