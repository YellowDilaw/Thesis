<!DOCTYPE html>

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
            ?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<link type="text/css" rel="stylesheet" href="figure.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
	<!-- Latest compiled and minified CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Latest compiled JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	<title>MITM</title>
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
	
	.dashboard {
	  display: flex;
	}

	.dashboard__left {
	  width: 300px;
	  background-color: #051D40;
	  color: white;
	  padding: 50px;
	}

	.dashboard__right {
	  flex: 1;
	  padding: 50px;
	  background-color: #DBDBDB;
	}

	.dashboard__title {
	  font-size: 28px;
	  font-weight: bold;
      cursor: pointer;
	  margin-bottom: 20px;
	}

	.dashboard__lesson1 {
      visibility: visible;
	  margin-bottom: 10px;
	  cursor: pointer;
	  font-size: 18px;
	}

    .dashboard__lesson2 {
      visibility: visible;
	  margin-bottom: 10px;
	  cursor: pointer;
	  font-size: 18px;
	}

    .dashboard__lesson3 {
      visibility: visible;
	  margin-bottom: 10px;
	  cursor: pointer;
	  font-size: 18px;
	}

	.dashboard__assessment {
	  visibility: visible;
	  font-size: 18px;
      cursor: pointer;
	  margin-top: 30px;
	}

	.round-buttc{
	  padding: 10px;
      border-radius: 8px;
      color: white;
      background-color: #051D40;
      border: 2px solid black;
      width: 230px;
	}

    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0,0,0,0.4);
    }

    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 60%;
        text-align: center;
    }

    .modal-button {
        padding: 10px;
        border-radius: 8px;
        color: white;
        background-color: #051D40;
        border: 2px solid black;
        width: 100px;
        margin: 10px;
        cursor: pointer;
    }

    #openModalButton {
        background-color: #051D40;
        color: white;
        border: none;
    }

    #openModalButton:focus {
        outline: 1px solid #051D40;
    }

    .button-container {
    display: flex;
    justify-content: center;
    margin-top: 20px; 
    }

    #enrollButton{
        visibility: visible;
        background-color: #051D40;
        color: white;
        border: none;
        font-size: 18px;
    	margin-top: 10px;
        margin-bottom: 20px;
    }

    #enrollButton:focus{
        outline: 1px solid #051D40;
    }

    div.a {
      display: flex;
      min-height: 100vh;
    }

    div.b {
      flex: 1;
    } 

    ul.countdown {
      list-style-type: none;
      list-style: none;
      display: flex;
      justify-content: center;
      padding: 0;
    }

    ul.countdown li {
      font-size: 30px;
      margin: 0 20px;
    }

    /* Style for minutes and seconds */
    ul.countdown li span {
      font-size: 48px;
      color: red;   
    }

    .timer-box {
      background-color: #333; /* Background color of the timer box */
      color: #fff; /* Text color */
      padding: 10px; /* Add padding to the timer box */
      border-radius: 5px; /* Add rounded corners for a modern look */
      display: inline-block; /* Make the timer box inline so it fits with the content */
    }

    .countdown {
      font-size: 24px; /* Adjust the font size as needed */
      text-align: center; /* Center the timer text */
    }

    #minutes,
    #seconds {
      padding: 5px; /* Add padding to separate minutes and seconds */
      background-color: #444; /* Background color for each digit */
      border-radius: 3px; /* Add rounded corners to digits */
      margin: 0 5px; /* Add margin between minutes and seconds */
    }

    #doneButton{
      background-color: #051D40;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      text-decoration: none;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

      #doneButton:hover {
        background-color: #032135;
    }

    .dashboard__lesson p.active{
      color:red;
    }

</style>
</head>



<body onload="showContent('lesson')">

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

<!-- MITM PAGE -->
<div class="a">
        <div class="dashboard__left">
            <div class="dashboard__title" onclick="showContent('lesson')">MITM Attack</div>
            <div class="dashboard__lessons">
            <?php
              $user_id = $results['id'];

              $sql = "SELECT * FROM courses WHERE user_id = $user_id";
              $result = $con->query($sql);

              if ($result->num_rows > 0) 
              {
                while ($row = $result->fetch_assoc()) 
                {
                  // Access the specific columns you fetched
                  $course1 = $row["Course1"];

                  // Check if the column value is equal to 1
                  if ($course1 == 1) 
                  {
                    // Print HTML code if the condition is met
                    echo '<div class="dashboard__lesson dashboard__lesson1" id="dashboard__lesson-1" onclick="showContent(\'lesson1\')"><p class="text" onClick="changeColor(1)">Introduction to MITM</p></div>';
                    echo '<div class="dashboard__lesson dashboard__lesson2" id="dashboard__lesson-2" onclick="showContent(\'lesson2\')"><p class="text" onClick="changeColor(2)">Recognizing and Avoiding Attacks</p></div>';
                    echo '<div class="dashboard__lesson dashboard__lesson3" id="dashboard__lesson-3" onclick="showContent(\'lesson3\')"><p class="text" onClick="changeColor(3)">Importance of MITM Awareness</p></div>';
                    echo '</div>';
                    echo '<div class="dashboard__assessment">';
                    echo '<button id="openModalButton" onclick="showContent(\'assessment\')">Assessment</button>';
                  }
                  else if($course1 == 0){
                    echo '<form action="enroll.php" method="post">
                            <input id="enrollButton" class="dashboard__enroll" type="submit" name="enroll" value="Enroll">
                          </form>';
                  }
                }
              } else {
                    echo '<form action="enroll.php" method="post">
                            <input id="enrollButton" class="dashboard__enroll" type="submit" name="enroll" value="Enroll">
                          </form>';
              }
              $user_id = $results['id'];
              // Check the current value of mitm_prog
              $sql = "SELECT mitm_prog FROM progress WHERE user_id = $user_id";
              $result = $con->query($sql);

              if ($result->num_rows > 0) {
                  $row = $result->fetch_assoc();
                  $currentValue = $row['mitm_prog'];

                  // Check for concatenated numbers in mitm_prog
                  $hideButton1 = strpos($currentValue, '1') !== false;
                  $hideButton2 = strpos($currentValue, '2') !== false;
                  $hideButton3 = strpos($currentValue, '3') !== false;
              } else {
                  $hideButton1 = false;
                  $hideButton2 = false;
                  $hideButton3 = false;
              }
            ?>
            </div>
        </div>
        <div class="dashboard__right">
            <div id="coursecontent">
                <!-- Content for Title -->
                <div id="lessonContent" class="lesson-content" style="display: none;">
                    <p>
                    <?php
                    $module = "MITM";
                    $lessonum = "0";
                    include ('coursecontent.php');
                    ?>
                    </p>
                  </div>
                
                 <!-- Content for Lesson 1 -->
                <div id="lesson1Content" class="lesson-content" style="display: none;">
                    <p>
                    <?php
                    $lessonum = "1";
                    include ('coursecontent.php');
                    ?>
                    <p>
                    <?php if (!$hideButton1): ?>
                    <form action="mitmprog1.php" method="post">
                        <input type="hidden" name="update_action" value="update_column_1">
                        <input type="submit" id="doneButton" name="update_button" value="Mark as Done" />
                    </form>
                    <?php endif; ?>
                  </div>

                <!-- Content for Lesson 2 -->
                <div id="lesson2Content" class="lesson-content" style="display: none;">
                    <p>
                    <?php
                    $lessonum = "2";
                    include ('coursecontent.php');
                    ?>
                    </p>
                    <?php if (!$hideButton2): ?>
                    <form action="mitmprog2.php" method="post">
                        <input type="hidden" name="update_action" value="update_column_1">
                        <input type="submit" id="doneButton" name="update_button" value="Mark as Done" />
                    </form>
                    <?php endif; ?>
                    </div>

                <!-- Content for Lesson 3 -->
                <div id="lesson3Content" class="lesson-content" style="display: none;">
                    <p>
                    <?php
                    $lessonum = "3";
                    include ('coursecontent.php');
                    ?>
                    </p>
                    <?php if (!$hideButton3): ?>
                    <form action="mitmprog3.php" method="post">
                        <input type="hidden" name="update_action" value="update_column_1">
                        <input type="submit" id="doneButton" name="update_button" value="Mark as Done" />
                    </form>
                    <?php endif; ?>
                   </div>

                <!-- Content for Assessment -->
                <div id="assessmentContent" class="lesson-content" style="display: none;">
                <center>
                  <div class="timer-box">
                    <div class="countdown">
                      <span id="minutes">30</span>Minutes
                      <span id="seconds">00</span>Seconds
                    </div>
                  </div>
                </center>
                  <h1>Assessment</h1>
                  <p>Choose the best answer:</p>
                    <?php
                    
                    
                    include ('quiz.php');
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- The modal dialog -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <p>You are about to take the assessment. Once you click on "Yes," you will be unable to view the lessons. Do you want to take the assessment?</p>
            <div class="button-container">
                <button id="yesButton" class="modal-button" onclick="startAssessment()">Yes</button>
                <button id="noButton" class="modal-button" onclick="cancelAssessment()">No</button>
            </div>
        </div>
    </div>


<script type="text/javascript">
// Function to submit the form after a delay
function submitForm() {
    // Add your form's ID here (replace 'yourFormID' with the actual ID)
    var form = document.getElementById('quizform');
    
    // Delay the form submission by 10 seconds (10000 milliseconds)
    setTimeout(function() {
        form.submit();
    }, 1800000);
}
</script> 
<script>
  var assessmentStarted = false;
  var buttonPresses = [false, false, false];

  function changeColor(id) {
  // Remove the "active" class from all text-box elements
  const textBoxes = document.querySelectorAll('.dashboard__lesson');
  textBoxes.forEach((textBox) => {
    textBox.classList.remove('active');
  });

  // Add the "active" class to the clicked text-box
  const clickedTextBox = document.getElementById(`dashboard__lesson-${id}`);
  clickedTextBox.classList.add('active');

  // Remove the "active" class from all text elements
  const textElements = document.querySelectorAll('.text');
  textElements.forEach((text) => {
    text.classList.remove('active');
  });

  // Change the color of the clicked text
  const text = clickedTextBox.querySelector('.text');
  text.classList.add('active');
  }

  function showContent(contentId) {
    // If the assessment has started, do not allow clicking on title and lessons
    if (assessmentStarted) {
      return;
    }

    // Hide all lesson content
    const lessonContents = document.querySelectorAll('.lesson-content');
    lessonContents.forEach((content) => {
      content.style.display = 'none';
    });

    // Show the selected content
    const selectedContent = document.getElementById(`${contentId}Content`);
    if (selectedContent) {
      selectedContent.style.display = 'block';
    }

    // Display the modal when "Assessment" is clicked
    if (contentId === 'assessment' && !assessmentStarted) {
      const modal = document.getElementById('myModal');
      modal.style.display = 'block';
    }
  }

  function startAssessment() {
    submitForm();
    var modal = document.getElementById('myModal');
    modal.style.display = 'none'; // Close the modal
    assessmentStarted = true;

    // Set the date for the countdown (30 minutes from now)
    var countDownDate = new Date();
    countDownDate.setMinutes(countDownDate.getMinutes() + 30);

    // Update the countdown every 1 second
    var x = setInterval(function () {
      // Get the current date and time
      var now = new Date().getTime();

      // Calculate the remaining time
      var distance = countDownDate - now;

      // Calculate minutes and seconds
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);

      // Display the countdown timer
      document.getElementById("minutes").innerHTML = minutes;
      document.getElementById("seconds").innerHTML = seconds;

      // If the countdown is over, automatically submit
      if (distance < 0) {
        clearInterval(x);
        document.getElementById("minutes").innerHTML = "0";
        document.getElementById("seconds").innerHTML = "0";
        document.getElementById("countdown").innerHTML = "SUBMIT"; 
      }
    }, 1000);
  }

  function submitAssessment() {
    // You can replace this with your submission logic
    // Here you can add your logic to submit the assessment
  }


  function cancelAssessment() {
    var modal = document.getElementById('myModal');
    modal.style.display = 'none';
    
    // Hide the assessment content
    var assessmentContent = document.getElementById('assessmentContent');
    assessmentContent.style.display = 'none';
  }


  function pressButton(buttonIndex) {
    buttonPresses[buttonIndex - 1] = true;

    if (buttonPresses[0] && buttonPresses[1] && buttonPresses[2]) {
      // Assuming you want to do something when all buttons are pressed
      // For example, displaying a message or enabling an element
    }
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  }

  //refresh alert
  window.addEventListener('beforeunload', function (e) {
    if (assessmentStarted) {
      var confirmationMessage =
        'Are you sure you want to leave this page? ' +
        'If you refresh, the assessment progress will be lost.';

      e.returnValue = confirmationMessage;

      return confirmationMessage;
    }
  });
</script>
</body>
</html>