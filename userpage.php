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
    <title>User Page</title>
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

        body, h1, h2, h3, h4, h5, h6 {
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

        /* Add a CSS class to style the table cells */
        .table td {
            border: none;
            padding: 10px; /* Add padding for spacing */
            min-width: 100px; /* Set the minimum width for table cells */
        }
		.indented {
            margin-left: 20px; /* Adjust the value as needed */
        }
    </style>

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
    <h2 class="header__title">User List</h2>
</div>
<div class="container" style="display: flex; justify-content: center;">
	<div style="text-align: center;">
        <table class="table">
            <tr>
                <th class="indented">Name</th>
                <th>Email</th>
                <th>MITM</th>
                <th>Malware</th>
                <th>Phishing</th>
                <th>Hacking</th>
                <th></th>
                <th></th>
            </tr>
            <div class="section">
				<?php
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

				// SQL query to fetch data from the users table
				$query = "SELECT * FROM users WHERE id > 0";
                
				// Execute the query
				$result = mysqli_query($conn, $query);

				if (!$result) {
					die('Error fetching data: ' . mysqli_error($conn));
				}

				// Loop through the result set and display data in a table
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>" . $row['fullname'] ."</td>";
					echo "<td>" . $row['email'] . "</td>";
					echo "<td>" . $row['q1'] . "</td>";
					echo "<td>" . $row['q2'] . "</td>";
					echo "<td>" . $row['q3'] . "</td>";
					echo "<td>" . $row['q4'] . "</td>";
					echo "<td><a href='editpage.php?id=" . $row['id'] . "'>Edit</a></td>"; // Edit button
					echo "<td><a href='delete.php?id=" . $row['id'] . "'>Delete</a></td>"; // Delete button
					echo "</tr>";
				}

                // Close the database connection
                mysqli_close($conn);
                ?>
            </div>
        </table>
	</div>
</div>
</body>
</html>