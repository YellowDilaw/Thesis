<?php
// Connect to the database (update with your database credentials)
$host = "localhost";
$username = "root";
$password = "";
$database = "accountsdb";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die('Database connection failed: ' . mysqli_connect_error());
}

// Retrieve quiz questions in a random order

$limit = 10; // Adjust the number of questions you want to display
$query = "SELECT * FROM questions WHERE module = '$module' ORDER BY RAND() LIMIT $limit";
$result = mysqli_query($conn, $query);

if (!$result) {
    die('Error fetching questions: ' . mysqli_error($conn));
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Quiz</title>
    <style>
    body {
        font-family: "Poppins", sans-serif;
        font-size: 18px;
    }
    </style>
</head>

<body>
        <?php
        //Chooses the specific process PHP for the active module.
        //Format of the Process PHP Should be "process'$module'.php"
        //Example, processMITM.php ; processMalware.php ; processPhishing.php ; processHacking.php
        echo '<form method="post" action="process';
        echo $module;
        echo '.php" id="quizform">';
        ?>
        <?php
        
        $questionNumber = 1;

        echo '<ol>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo $questionNumber . '. ' . $row['question_text'] . '<br>';
            $questionNumber++; // Increment the question number

            // Retrieve options for this question
            $questionId = $row['question_id'];
            
            $optionsQuery = "SELECT * FROM options WHERE question_id = $questionId";

            $optionsResult = mysqli_query($conn, $optionsQuery);

            if (!$optionsResult) {
                die('Error fetching options: ' . mysqli_error($conn));
            }

            while ($option = mysqli_fetch_assoc($optionsResult)) {
                echo '<input type="radio" name="question_' . $questionId . '" value="' . $option['option_id'] . '" required>'
                    . $option['option_text'] . '<br>';
            }
            
            echo '<br>';
            mysqli_free_result($optionsResult);
        }
        
        echo '</ol>';
        mysqli_free_result($result);
        
        ?>
    
    <input type="submit" class="modal-button" value="Submit" onclick="return confirm('Are you sure you want to submit the quiz?');">
    </form>


</body>
</html>