<?php
$user_id = $results['id'];
$sql = "SELECT * FROM courses WHERE user_id = $user_id";
$result = $con->query($sql);

if ($result->num_rows > 0) 
{
    while ($row = $result->fetch_assoc()) 
    {
        // Access the specific columns you fetched
        $MITMstat = $row["MITMstat"];
        $malwstat = $row["Malwarestat"];
        $phishstat = $row["Phishingstat"];
        $hackstat = $row["Hackingstat"];

        // Check if the column value is equal to 1
        if ($MITMstat == 1) 
        {
            // Print HTML code if the condition is met

        echo '    <div class="modbox">';
        echo '        <div class="modbox-img">';
        echo '            <a href="certMITM.php">';
        echo '                <img src="MITM.png" alt="Example Image">';
        echo '            </a>';
        echo '        </div>';
        echo '        <figcaption>MITM Certificate</figcaption>';
        echo '    </div>';

        }
        if ($malwstat == 1) 
        {

        echo '    <div class="modbox">';
        echo '        <div class="modbox-img">';
        echo '            <a href="certmalware.php">';
        echo '                <img src="malw.png" alt="Example Image">';
        echo '            </a>';
        echo '        </div>';
        echo '        <figcaption>Malware Certificate</figcaption>';
        echo '    </div>';

        }
        if ($phishstat == 1) 
        {

        echo '    <div class="modbox">';
        echo '        <div class="modbox-img">';
        echo '            <a href="certphishing.php">';
        echo '                <img src="phish.jpeg" alt="Example Image">';
        echo '            </a>';
        echo '        </div>';
        echo '        <figcaption>Phishing Certificate</figcaption>';
        echo '    </div>';

        }
        if ($hackstat == 1) 
        {

        echo '    <div class="modbox">';
        echo '        <div class="modbox-img">';
        echo '            <a href="certhacking.php">';
        echo '                <img src="hack.jpg" alt="Example Image">';
        echo '            </a>';
        echo '        </div>';
        echo '        <figcaption>Hacking Certificate</figcaption>';
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