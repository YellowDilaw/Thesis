<?php

$sql = "SELECT * FROM courses WHERE user_id = $user_id";
$result = $con->query($sql);

if ($result->num_rows > 0) 
{
    while ($row = $result->fetch_assoc()) 
    {
        // Access the specific columns you fetched
        $course1 = $row["Course1"];
        $course2 = $row["Course2"];
        $course3 = $row["Course3"];
        $course4 = $row["Course4"];

        // Check if the column value is equal to 1
        if ($course1 == 1) 
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
        if ($course2 == 1) 
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
        if ($course3 == 1) 
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
        if ($course4 == 1) 
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
    echo '</div>';
    echo '<center>';
    echo '<img src="unavail.png" style="width: 250px; height: 250px">';
    echo '</center>';
}

$con->close();
?>