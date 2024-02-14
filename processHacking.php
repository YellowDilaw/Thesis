<!DOCTYPE html>
<html>
<head>
    <title>Assessment Result</title>
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

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            margin: 50px auto;
            width: 80%;
            max-width: 600px;
        }

        h1 {
            color: #051D40;
        }

        .score {
            font-size: 24px;
            color: #051D40;
            margin-top: 20px;
        }

        .back-button,.cert-button {
            background-color: #051D40;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            cursor: pointer;
        }

        .back-button:hover,.cert-button:hover {
            background-color: #030A1E;
        }
        .feedback{
            text-align: left !important;
        }
        #hideScore{
            display: none;
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
        <a href="logout.php" action="logout.php" method="POST" class="navbar__item navbar__item--logout">LOGOUT</a>  
    </nav>
    </div>
    </div>
    <div class="container">
        <h1>Quiz Result</h1>
<?php
session_start();
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'accountsdb';

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die('Database connection failed: ' . mysqli_connect_error());
}

$score = 0;
$feedback = []; // Array to store feedback for each question

// Fetch the correct answers for questions
$correctAnswers = [];
$query = "SELECT q.question_id, q.question_text, o.option_id, o.option_text FROM questions q
          JOIN options o ON q.question_id = o.question_id
          WHERE o.is_correct = 1";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $correctAnswers[$row['question_id']] = [
        'question_text' => $row['question_text'],
        'option_id' => $row['option_id'],
        'option_text' => $row['option_text'],
    ];
}

// Iterate through questions and check user's answers
foreach ($_POST as $key => $value) {
    if (strpos($key, 'question_') === 0) {
        $questionId = substr($key, strlen('question_'));
        $selectedOptionId = (int)$value;

        // Check if the selected option is correct
        $query = "SELECT q.question_text, o.option_id, o.option_text, o.is_correct FROM questions q
                  JOIN options o ON q.question_id = o.question_id
                  WHERE o.option_id = $selectedOptionId";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            die('Error fetching option: ' . mysqli_error($conn));
        }

        $row = mysqli_fetch_assoc($result);

        if (isset($correctAnswers[$questionId]) && $selectedOptionId == $correctAnswers[$questionId]['option_id']) {
            $score += 1;
        } else {
            // Store feedback for incorrect answer along with the correct answer
            $feedback[$questionId] = [
                'question_text' => $row['question_text'],
                'selected_option_text' => $row['option_text'],
                'correct_option_text' => $correctAnswers[$questionId]['option_text'],
            ];
        }

        mysqli_free_result($result);
    }
}

// Update the user's score in the database (assuming a user is logged in)
$email = $_SESSION['email']; // Replace with the actual username of the user
$query = mysqli_query($conn, "SELECT * from users WHERE email ='$email'"); 
$results = mysqli_fetch_array($query); // Fetches active email row

$moduleQuiz = "HackingQuiz";
$query = "UPDATE courses SET $moduleQuiz = $score WHERE user_id = {$results['id']};";

$result = mysqli_query($conn, $query);

if (!$result) {
    die('Error updating score: ' . mysqli_error($conn));
}

// Display the user's score and feedback
echo "<div class='score'>Your score: $score</div>";

foreach ($feedback as $questionId => $answer) {
    echo "<br>";
    echo "<div class='lefty'>" . "<div class='feedback'><b>Question:</b> {$answer['question_text']}</div>";
    echo "<div class='feedback'><b>Your answer:</b> {$answer['selected_option_text']}</div>";
    echo "<div class='feedback'><b>Correct answer:</b> {$answer['correct_option_text']}</div></div>";
}

$passingScore = 8; 

//IF PASS
if ($score >= $passingScore) {
    
    echo '<br><br><a href="certHacking.php" class="cert-button" target="_blank">View Certificate</a>';
    $scoreformat = ';' . $score;
    $user_id = $results['id'];

    // Update the user's score in the database (assuming a user is logged in)
    $email = $_SESSION['email']; // Replace with the actual username of the user
    $query = mysqli_query($conn, "SELECT * from users WHERE email ='$email'"); 
    $results = mysqli_fetch_array($query); // Fetches active email row

    $query = "UPDATE courses SET Hackingstat = 1 WHERE user_id = {$results['id']};";
    $result = mysqli_query($conn, $query);

    //STORE SCORE IN DATABASE
    // Check the current value of Hacking_prog
    $sql = "SELECT hacking_quiz_score FROM progress WHERE user_id = $user_id";
    $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                
            $row = $result->fetch_assoc();
            $existingScore = $row['hacking_quiz_score'];
            $setScore = $existingScore . $scoreformat;
            // Update the user's score in the database (assuming a user is logged in)

            // If a row with the user_id exists, update hacking_quiz_score
            $sql = "UPDATE progress SET hacking_quiz_score = '$setScore' WHERE user_id = $user_id";

            if ($conn->query($sql) === TRUE) {
            } else {
                // Error updating value, send a response to JavaScript
                echo "Error updating value: " . $conn->error;
            }
            
            // $sql2 = "UPDATE progress SET hacking_prog = '$newValue' WHERE user_id = $user_id";

            // if ($conn->query($sql2) === TRUE) {
            // } else {
            //     // Error updating value, send a response to JavaScript
            //     echo "Error updating value: " . $conn->error;
            // }

            } 
            //for if ($result->num_rows > 0) ROW
            else {

                // If no row with the user_id exists, insert a new row
                $sql = "INSERT INTO progress (hacking_quiz_score ,user_id) VALUES ('$scoreformat', $user_id)";
                
                if ($conn->query($sql) === TRUE) {
                    
                } else {
                    echo "Error creating new row: " . $conn->error;
                }
            }
            
    if (!$result) {
        die('Error updating score: ' . mysqli_error($conn));
    }


}

//IF FAIL
else{

    $scoreformat = ';' . $score;
    $user_id = $results['id'];

    //STORE SCORE IN DATABASE
    // Check the current value of Hacking_prog
    $sql = "SELECT hacking_quiz_score FROM progress WHERE user_id = $user_id";
    $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                
            $row = $result->fetch_assoc();
            $existingScore = $row['hacking_quiz_score'];
            $setScore = $existingScore . $scoreformat;
            // Update the user's score in the database (assuming a user is logged in)

            // If a row with the user_id exists, update hacking_quiz_score
            $sql = "UPDATE progress SET hacking_quiz_score = '$setScore' WHERE user_id = $user_id";

            if ($conn->query($sql) === TRUE) {
            } else {
                // Error updating value, send a response to JavaScript
                echo "Error updating value: " . $conn->error;
            }
            
            } //for if ($result->num_rows > 0) ROW

            else {

                // If no row with the user_id exists, insert a new row
                $sql = "INSERT INTO progress (hacking_quiz_score ,user_id) VALUES ('$scoreformat', $user_id)";
                
                if ($conn->query($sql) === TRUE) {
                    
                } else {
                    echo "Error creating new row: " . $conn->error;
                }
            }
            
    if (!$result) {
        die('Error updating score: ' . mysqli_error($conn));
    }

}


?>
<br><br><br>

<a href="javascript:history.back()" class="back-button">Retake Quiz</a><br><br><br>

<button type="button" onClick="showScore()"> Click to see your attempts </button>

    <div id="hideScore">
    <?php
    //HISTORY SCORES
    $db_name = "accountsdb";
    $db_username = "root";
    $db_pass = "";
    $db_host = "localhost";
    $con = mysqli_connect($db_host, $db_username, $db_pass, $db_name) or die(mysqli_error()); // Connect to the server

    $email = $_SESSION['email'];
    $query = mysqli_query($con, "SELECT * from users WHERE email ='$email'");
    $results = mysqli_fetch_array($query); // Fetch the active email row

    $user_id = $results['id'];

    // Check the current value of phishing_prog
    $sql = "SELECT hacking_quiz_score FROM progress WHERE user_id = $user_id";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $currentValue = $row['hacking_quiz_score'];

        // Split the scores and display them from newest to oldest
        $scores = array_reverse(explode(';', $currentValue));
        
        echo '<br><b>Past Attempts</b><br><br>';
        foreach ($scores as $score) {
            if ($score !== '') {
                echo $score . ' out of 10<br><br>';
            }
        }
    } else {
        echo 'Take the Quiz first';
    }
    mysqli_close($conn);
    ?>
    </div>

</div>
</body>
</html>

<script>
    function showScore(){
        const showattempts = document.getElementById('hideScore');

        showattempts.style.display = 'block';
    }
</script>
