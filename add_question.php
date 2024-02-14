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

// Retrieve form data
$questionText = $_POST['question_text'];
$option1 = $_POST['option1'];
$option2 = $_POST['option2'];
$option3 = $_POST['option3'];
$option4 = $_POST['option4'];
$correctOption = $_POST['correct_option'];
$module = $_POST['module'];

// Insert the question into the database
$query = "INSERT INTO questions (question_text, module, user_id) VALUES ('$questionText', '$module', 1)";
$result = mysqli_query($conn, $query);

if (!$result) {
    die('Error inserting question: ' . mysqli_error($conn));
}

// Get the ID of the inserted question
$questionId = mysqli_insert_id($conn);

// Insert options and mark the correct option
$options = [$option1, $option2, $option3, $option4];
for ($i = 0; $i < 4; $i++) {
    $isCorrect = ($i + 1 == $correctOption) ? 1 : 0;
    $optionText = mysqli_real_escape_string($conn, $options[$i]);

    $query = "INSERT INTO options (question_id, option_text, is_correct) VALUES ($questionId, '$optionText', $isCorrect)";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die('Error inserting option: ' . mysqli_error($conn));
    }
}

mysqli_close($conn);

// Redirect back to the question maker page with a success message
header('Location: /thesis/quiz_maker.php');
?>