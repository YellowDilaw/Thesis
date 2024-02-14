<?php

$user_id = $results['id'];

$sql = "SELECT * FROM users WHERE id = $user_id";
$result = $con->query($sql);

if ($result->num_rows > 0) 
{
	while ($row = $result->fetch_assoc()) 
	{
		// Access the specific columns you fetched
		$q1 = $row["q1"];
		$q2 = $row["q2"];
		$q3 = $row["q3"];
		$q4 = $row["q4"];

		// Check if the column value is equal to 1
		if ($q1 == 1) 
		{
			// Print HTML code if the condition is met

		echo '    <div class="modbox">';
		echo '        <div class="modbox-img">';
		echo '            <a href="MITM.php">';
		echo '                <img src="MITM.png" alt="Example Image">';
		echo '            </a>';
		echo '        </div>';
		echo '        <figcaption>MITM</figcaption>';
		echo '    </div>';
			
		}
		if ($q2 == 1) 
		{

		echo '    <div class="modbox">';
		echo '        <div class="modbox-img">';
		echo '            <a href="malware.php">';
		echo '                <img src="malw.png" alt="Example Image">';
		echo '            </a>';
		echo '        </div>';
		echo '        <figcaption>Malware</figcaption>';
		echo '    </div>';

		}
		if ($q3 == 1) 
		{

		echo '    <div class="modbox">';
		echo '        <div class="modbox-img">';
		echo '            <a href="phishing.php">';
		echo '                <img src="phish.jpeg" alt="Example Image">';
		echo '            </a>';
		echo '        </div>';
		echo '        <figcaption>Phishing</figcaption>';
		echo '    </div>';

		}
		if ($q4 == 1) 
		{

		echo '    <div class="modbox">';
		echo '        <div class="modbox-img">';
		echo '            <a href="hacking.php">';
		echo '                <img src="hack.jpg" alt="Example Image">';
		echo '            </a>';
		echo '        </div>';
		echo '        <figcaption>Hacking</figcaption>';
		echo '    </div>';

		}
	}
} else {
	echo "No results found";
}


?>
