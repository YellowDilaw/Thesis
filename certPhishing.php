<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0,, user-scalable=no">
   <title>Certificate of Completion</title>
</head>
<body>

<style type="text/css">
     .container {
       position: relative;
       width: 100%; /* Set the width of the container */
     }


     .text {
       position: absolute;
       top: 47%; /* Adjust the top position as needed */
       left: 50%; /* Adjust the left position as needed */
       transform: translate(-50%, -50%);
       padding: 10px; /* Optional: Add padding to the text */
       z-index: 1; /* Ensure the text appears above the image */
	   font-size: 30px;
	}
  .text2 {
       position: absolute;
       top: 57%; /* Adjust the top position as needed */
       left: 50%; /* Adjust the left position as needed */
       transform: translate(-50%, -50%);
       padding: 10px; /* Optional: Add padding to the text */
       z-index: 1; /* Ensure the text appears above the image */
	   font-size: 30px;
	}


    div, aside, button {
      display: block;
      text-align: center;
    }
	.round-buttc{
	padding: 10px;
    border-radius: 8px;
    color: white;
    background-color: #051D40;
    border: 2px solid black;
    width: 2;
	cursor: pointer;
	}
  @media print {
    /* Set the page size to A4 (210mm x 297mm) */
    @page {
		
      size: 210mm 297mm, landscape;
      margin: 0; /* Remove default page margins */
    }

    body * {
      display: none;
    }

    /* Sets body and elements in it to not display */

    .print-area, .print-area * {
      display: block;
    }

    /* Sets print area element and all its content to display */

    .print-area {
      width: 100%; /* Ensure content fills the paper width */
      height: 100%; /* Ensure content fills the paper height */
    }

    .print-area img {
      max-width: 100%; /* Ensure images fit within the paper width */
      max-height: 100%; /* Ensure images fit within the paper height */
    }
	
  }


</style>

<body data-rsssl=1>

<center><button class="round-buttc" id="printBtn">Print</button></center>

  <div id="the-content">
  	<div class="container">
  		<img width=99% height=100% src="cert.png">
		  	<div class="text">
			  <?php 
				session_start();
					$db_name = "accountsdb"; 
					$db_username = "root"; 
					$db_pass = ""; 
					$db_host = "localhost"; 
					$con = mysqli_connect("$db_host","$db_username","$db_pass", "$db_name") 
					or die($mysqli_error()); //Connect to server

					$email = $_SESSION['email'];
					$query = mysqli_query($con, "SELECT * from users WHERE email ='$email'"); 
					$results = mysqli_fetch_array($query); // Fetches active email row
          
					echo $results['fullname'];



				?>
			</div>
      <div class="text2">
        <br>
        Phishing
      </div>
	</div>
  </div>

  <aside>
    
  </aside>

</body>

<script type="text/javascript">

  function areaPrint() {
    const areaToPrint = document.getElementById('the-content');
    // Select the element to print

    areaToPrint.classList.add('print-area'); 
    // Adds the print-area class to the element
    
    window.print();
    // Prints the area to which the class was assigned only
  }

  document.getElementById('printBtn').addEventListener('click', areaPrint);

</script>
  
</body>
</html>
