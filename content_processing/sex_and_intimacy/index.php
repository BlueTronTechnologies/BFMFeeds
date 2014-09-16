<?php
// Connecting, selecting database
$link = mysql_connect('localhost:3306', 'bluefrbm_mobi', 'Manopdiemaan84')
    or die('Could not connect: ' . mysql_error());
mysql_select_db('bluefrbm_mobimedia') or die('Could not select database');

// Performing SQL query to get day
$query = "SELECT day,entry from sex_and_intimacy_day";
$result = mysql_query($query) or die('Query failed: ' . mysql_error());
$line = mysql_fetch_array($result, MYSQL_ASSOC);

//Convert SQL date to date format
$date = strtotime($line["day"]);
$entry = $line["entry"];
$date_convert = date('Y-m-d',$date);

$today = date('Y-m-d');

//If the date is incorrect, move the day by 1
if($date_convert!=$today){
    $entry++;
    $newentry = $entry + 1;

    mysql_query("UPDATE sex_and_intimacy_day SET Entry='".$newentry."' WHERE Entry = '".$entry."'");
    mysql_query("UPDATE sex_and_intimacy_day SET Day='".$today."' WHERE Day = '".$date_convert."'");
}

// Performing SQL query to get data
$query = "SELECT text FROM sex_and_intimacy where entry='".$entry."'";
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

$message = "";

// Printing results in HTML
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {

            $message = $line["text"];
}

echo "<rss>
<channel>
<title>Bluefin Mobile - Sex and Intimacy Tips</title>
<item>
<title>Sex and Intimacy Tips</title>
<description>";

echo $message;

echo "</description>
</item>
</channel>
<head/>
</rss>";

// Free resultset
mysql_free_result($result);

// Closing connection
mysql_close($link);
?>