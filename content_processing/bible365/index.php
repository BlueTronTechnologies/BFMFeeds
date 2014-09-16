<?php
// Connecting, selecting database
$link = mysql_connect('localhost:3306', 'bluefrbm_mobi', 'Manopdiemaan84')
    or die('Could not connect: ' . mysql_error());
mysql_select_db('bluefrbm_mobimedia') or die('Could not select database');

// Performing SQL query to get day
$query = "SELECT entry,day from bible365_day";
$result = mysql_query($query) or die('Query failed: ' . mysql_error());
$line = mysql_fetch_array($result, MYSQL_ASSOC);

//Convert SQL date to date format
$date = strtotime($line["entry"]);
$date_convert = date('Y-m-d',$date);

$day = $line["day"];

$today = date('Y-m-d');

//If the date is incorrect, move the day by 1
if($date_convert!=$today){
    $newday = $day + 1;

    mysql_query("UPDATE bible365_day SET Entry='".$today."' WHERE Entry = '".$date_convert."'");
    mysql_query("UPDATE bible365_day SET Day='".$newday."' WHERE Day = '".$day."'");
}

// Performing SQL query to get data
$query = "SELECT verse,type FROM bible365 where day='".$day."'";
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

$oldTestament = "Old Testament: ";
$newTestament = " New Testament: ";
$pandp = " Psalms and Proverbs: ";

// Printing results in HTML
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {

        if($line["type"]=="NT"){
             $newTestament = $newTestament.$line["verse"];
        }
        if($line["type"]=="OT"){
            $oldTestament = $oldTestament.$line["verse"];
        }
        if($line["type"]=="PP"){
            $pandp = $pandp.$line["verse"];
        }
}


echo '<?xml version="1.0" encoding="UTF-8" ?>';
echo '<rss version="2.0"><channel><title>Bluefin Mobile - Bible 365</title><item><title>Bible 365</title><description>';

echo "Today's reading comes from ".$oldTestament.", ".$newTestament.", ".$pandp;

echo '</description></item></channel></rss>';

// Free resultset
mysql_free_result($result);

// Closing connection
mysql_close($link);
?>