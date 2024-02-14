<?php   
$user_id = $results['id'];

$sql = "SELECT * FROM progress WHERE user_id = $user_id";
$result = $con->query($sql);

//MITM PROGRESS
$sqlprog = "SELECT mitm_prog FROM progress WHERE user_id = $user_id";
$progresult1 = $con->query($sqlprog);
$sqlpass = "SELECT MITMstat FROM courses WHERE user_id = $user_id";
$passresult1 = $con->query($sqlpass);

if($passresult1->num_rows > 0){
    $row = $passresult1->fetch_assoc();
    $currentstat = $row['MITMstat'];

if ($progresult1->num_rows > 0) {
    $row = $progresult1->fetch_assoc();
    $currentValue = $row['mitm_prog'];

    // Check for concatenated numbers in MITM_prog
    $mitmprogcheck1 = strpos($currentValue, '1') !== false;
    $mitmprogcheck2 = strpos($currentValue, '2') !== false;
    $mitmprogcheck3 = strpos($currentValue, '3') !== false;
    $mitmprogcheck4 = strpos($currentstat, '1') !== false;

    $mitmprogress1 = 0;
    $mitmprogress2 = 0;
    $mitmprogress3 = 0;
    $mitmprogress4 = 0;

    if($mitmprogcheck1 === true){
        $mitmprogress1 = 25;
    }
    if($mitmprogcheck2 === true){
        $mitmprogress2 = 25;
    }
    if($mitmprogcheck3 === true){
        $mitmprogress3 = 25;
    }
    if($mitmprogcheck4 === true){
        $mitmprogress4 = 25;
    }

    $mitmSumProg = $mitmprogress1 + $mitmprogress2 + $mitmprogress3 + $mitmprogress4;

} else {
    $mitmprogcheck1 = false;
    $mitmprogcheck2 = false;
    $mitmprogcheck3 = false;
    $mitmprogcheck4 = false;
}
}
//END OF MITM PROG

//MALWARE PROGRESS
$sqlprog2 = "SELECT malware_prog FROM progress WHERE user_id = $user_id";
$progresult2 = $con->query($sqlprog2);
$sqlpass2 = "SELECT Malwarestat FROM courses WHERE user_id = $user_id";
$passresult2 = $con->query($sqlpass2);

if($passresult2->num_rows > 0){
    $row = $passresult2->fetch_assoc();
    $currentstat = $row['Malwarestat'];

if ($progresult2->num_rows > 0) {
    $row = $progresult2->fetch_assoc();
    $currentValue = $row['malware_prog'];

    // Check for concatenated numbers in malware_prog
    $malwareprogcheck1 = strpos($currentValue, '1') !== false;
    $malwareprogcheck2 = strpos($currentValue, '2') !== false;
    $malwareprogcheck3 = strpos($currentValue, '3') !== false;
    $malwareprogcheck4 = strpos($currentstat, '1') !== false;

    $malwareprogress1 = 0;
    $malwareprogress2 = 0;
    $malwareprogress3 = 0;
    $malwareprogress4 = 0;

    if($malwareprogcheck1 === true){
        $malwareprogress1 = 25;
    }
    if($malwareprogcheck2 === true){
        $malwareprogress2 = 25;
    }
    if($malwareprogcheck3 === true){
        $malwareprogress3 = 25;
    }
    if($malwareprogcheck4 === true){
        $malwareprogress4 = 25;
    }

    $malwareSumProg = $malwareprogress1 + $malwareprogress2 + $malwareprogress3 + $malwareprogress4;

} else {
    $malwareprogcheck1 = false;
    $malwareprogcheck2 = false;
    $malwareprogcheck3 = false;
    $malwareprogcheck4 = false;
}
}
//END OF MALWARE PROG

//PHISHING PROGRESS
$sqlprog3 = "SELECT phishing_prog FROM progress WHERE user_id = $user_id";
$progresult3 = $con->query($sqlprog3);
$sqlpass3 = "SELECT Phishingstat FROM courses WHERE user_id = $user_id";
$passresult3 = $con->query($sqlpass3);

if($passresult3->num_rows > 0){
    $row = $passresult3->fetch_assoc();
    $currentstat = $row['Phishingstat'];

if ($progresult3->num_rows > 0) {
    $row = $progresult3->fetch_assoc();
    $currentValue = $row['phishing_prog'];

    // Check for concatenated numbers in phishing_prog
    $phishprogcheck1 = strpos($currentValue, '1') !== false;
    $phishprogcheck2 = strpos($currentValue, '2') !== false;
    $phishprogcheck3 = strpos($currentValue, '3') !== false;
    $phishprogcheck4 = strpos($currentstat, '1') !== false;

    $phishprogress1 = 0;
    $phishprogress2 = 0;
    $phishprogress3 = 0;
    $phishprogress4 = 0;
    if($phishprogcheck1 === true){
        $phishprogress1 = 25;
    }
    if($phishprogcheck2 === true){
        $phishprogress2 = 25;
    }
    if($phishprogcheck3 === true){
        $phishprogress3 = 25;
    }
    if($phishprogcheck4 === true){
        $phishprogress4 = 25;
    }

    $phishSumProg = $phishprogress1 + $phishprogress2 + $phishprogress3 + $phishprogress4;

} else {
    $phishprogcheck1 = false;
    $phishprogcheck2 = false;
    $phishprogcheck3 = false;
    $phishprogcheck4 = false;
}
}
//END OF PHISHING PROG

//HACKING PROGRESS
$sqlprog4 = "SELECT hacking_prog FROM progress WHERE user_id = $user_id";
$progresult4 = $con->query($sqlprog4);
$sqlpass4 = "SELECT Hackingstat FROM courses WHERE user_id = $user_id";
$passresult4 = $con->query($sqlpass4);

if($passresult4->num_rows > 0){
    $row = $passresult4->fetch_assoc();
    $currentstat = $row['Hackingstat'];

if ($progresult4->num_rows > 0) {
    $row = $progresult4->fetch_assoc();
    $currentValue = $row['hacking_prog'];

    // Check for concatenated numbers in MITM_prog
    $hackingprogcheck1 = strpos($currentValue, '1') !== false;
    $hackingprogcheck2 = strpos($currentValue, '2') !== false;
    $hackingprogcheck3 = strpos($currentValue, '3') !== false;
    $hackingprogcheck4 = strpos($currentstat, '1') !== false;

    $hackingprogress1 = 0;
    $hackingprogress2 = 0;
    $hackingprogress3 = 0;
    $hackingprogress4 = 0;
    if($hackingprogcheck1 === true){
        $hackingprogress1 = 25;
    }
    if($hackingprogcheck2 === true){
        $hackingprogress2 = 25;
    }
    if($hackingprogcheck3 === true){
        $hackingprogress3 = 25;
    }
    if($hackingprogcheck4 === true){
        $hackingprogress4 = 25;
    }

    $hackingSumProg = $hackingprogress1 + $hackingprogress2 + $hackingprogress3 + $hackingprogress4;

} else {
    $hackingprogcheck1 = false;
    $hackingprogcheck2 = false;
    $hackingprogcheck3 = false;
    $hackingprogcheck4 = false;
}
}
//END OF HACKING PROG

//RESULTS DISPLAY
if ($result->num_rows > 0) 
{
    while ($row = $result->fetch_assoc()) 
    {
        // Access the specific columns you fetched
        $course1 = $row["mitm_prog"];
        $course2 = $row["malware_prog"];
        $course3 = $row["phishing_prog"];
        $course4 = $row["hacking_prog"];

        // Check if the column value is equal to 1
        if (in_array($course1, [1, 2, 3, 12, 13, 21, 23, 31, 32, 123, 132, 213, 231, 312, 321]))
        {
            // Print HTML code if the condition is met
        echo '      <div class="homesubhead">MITM Progress</div><div class="percent">' 
                    . $mitmSumProg . "% Done </div>" 
                    .'<div class="progress-bar html">
                    <progress id="html" min="0" max="100" value="';
        echo $mitmSumProg;
        echo        '"></progress>
                    </div>';

        }
        if (in_array($course2, [1, 2, 3, 12, 13, 21, 23, 31, 32, 123, 132, 213, 231, 312, 321]))
        {
        echo '      <div class="homesubhead">Malware Progress</div><div class="percent">' 
                    . $malwareSumProg . "% Done </div>" 
                    .'<div class="progress-bar html">
                    <progress id="html" min="0" max="100" value="';
        echo $malwareSumProg;
        echo        '"></progress>
                    </div>';
        }
        if (in_array($course3, [1, 2, 3, 12, 13, 21, 23, 31, 32, 123, 132, 213, 231, 312, 321]))
        {
        echo '      <div class="homesubhead">Phishing Progress</div><div class="percent">' 
                    . $phishSumProg . "% Done </div>" 
                    .'<div class="progress-bar html">
                    <progress id="html" min="0" max="100" value="';
        echo $phishSumProg;
        echo        '"></progress>
                    </div>';
        }
        if (in_array($course4, [1, 2, 3, 12, 13, 21, 23, 31, 32, 123, 132, 213, 231, 312, 321]))
        {
        echo '      <div class="homesubhead">Hacking Progress</div><div class="percent">' 
                    . $hackingSumProg . "% Done </div>" 
                    .'<div class="progress-bar html">
                    <progress id="html" min="0" max="100" value="';
        echo $hackingSumProg;
        echo        '"></progress>
                    </div>';
        }
    }
} else {
    echo '</div>';
    echo '<center>';
    echo '<img src="unavail.png" style="width: 250px; height: 250px">';
    echo '</center>';
}

?>