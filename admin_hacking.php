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
    div.a {
      display: flex;
      min-height: 100vh;
    }

    div.b {
      flex: 1;
    } 

    .button {
      background-color: #051D40;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      text-decoration: none;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .button:hover {
      background-color: #030A1E;
    }

    .custom-file-input {
      display: inline-block;
      padding: 10px 20px;
      background-color: #051D40;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .custom-file-input:hover {
      background-color: #030A1E;
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

    input[type="file"] {
      display: none;
    }

    input[type="radio"] {
		margin-right: 5px;
	  }
  
</style>
</head>
<?php
$module = "Hacking";
?>
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

<!-- Hacking PAGE -->
<div class="a">
        <div class="dashboard__left">
            <div class="dashboard__title" onclick="showContent('lesson')">Hacking</div>
            <div class="dashboard__lessons">
            <form id="upld" >
              <label class="dashboard__lesson">
                  <input type="radio" id="title" name="lesson" value="0" required>Course Detail
              </label><br>
              <label class="dashboard__lesson">
                  <input type="radio" id="lesson1" name="lesson" value="1" required>Lesson 1
              </label><br>
              <label class="dashboard__lesson">
                  <input type="radio" id="lesson2" name="lesson" value="2" required>Lesson 2
              </label><br>
              <label class="dashboard__lesson">
                  <input type="radio" id="lesson3" name="lesson" value="3" required>Lesson 3
              </label><br>
            </form>
            </div>
        </div>
        <div class="dashboard__right">
            <div id="coursecontent">
                <!-- Content for Title -->
                <div id="lessonContent" class="lesson-content" style="display: none;">
                    
                    <form action="upload.php" method="post" enctype="multipart/form-data">
                    <h2>Upload Files</h2>
                    <p>
                       <input type="hidden" name="modname" value=<?php echo $module; ?> type="text" readonly></input>
                       for <?php echo $module; ?> <input type="hidden" name="lesson" type="text" id="selectedValue" readonly required></input>
                       <label id="result" name="result"></label>
                    </p>
                        Select File to Upload (Images/Videos):
                        <br>
                        <label class="custom-file-input" style="margin-top: 5px">
                        <input type="file" name="fileToUpload" id="fileToUpload">
                            Choose File
                        </label>
                        <input type="submit" value="Upload File" name="submit" class="button">
                    </form>
                    <br><br>
                   
                    <form action="upload_text.php" method="post">
                    <h2>Upload Text</h2> 
                    <p>
                       <input type="hidden" name="modname" value=<?php echo $module; ?> type="text" readonly></input>
                       for <?php echo $module; ?> <input type="hidden" name="lesson" type="text" id="selectedValue2" readonly required></input>
                       <label id="result2" name="result"></label>
                       
                    </p>
                        <textarea name="textToUpload" rows="6" cols="130"></textarea>
                        <br>
                        <input type="submit" value="Upload Text" name="submit_text" class="button">
                    </form>
                    
                    <br><br>
                    <h2>Uploaded Contents:</h2>
                    <?php
                    $lessonum = 0;
                    require_once ('display.php');
                    ?>
                </div>
            </div>
        </div>
</div>

<script>
    function showContent(contentId) {
        var lessonContents = document.getElementsByClassName("lesson-content");
        for (var i = 0; i < lessonContents.length; i++) {
            lessonContents[i].style.display = "none";
        }

        var selectedContent = document.getElementById(contentId + "Content");
        if (selectedContent) {
            selectedContent.style.display = "block";
        }
    }

    showContent('lesson');
</script>
<script>
        const form = document.getElementById('upld');
        const selectedValueInput = document.getElementById('selectedValue');
        const selectedValueInput2 = document.getElementById('selectedValue2');
        const result = document.getElementById('result');
        const result2 = document.getElementById('result2');

        form.addEventListener('change', function () {
            const selectedValue = document.querySelector('input[name="lesson"]:checked').value;
            selectedValueInput.value = selectedValue;
            selectedValueInput2.value = selectedValue;
            result.textContent = `Lesson ${selectedValue}`;
            result2.textContent = `Lesson ${selectedValue}`;
            
        });
</script>

</body>
</html>