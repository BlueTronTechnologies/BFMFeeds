<?php

# create and load the HTML
include('simple_html_dom.php');
$html = new simple_html_dom();
$html->load_file('https://www.nationallottery.co.za/powerball_home/results.asp?type=1');
 
# get an element representing the second paragraph
$element = $html->find('span[class=onGreenBackground]');
$element2 = $html->find('img');
$element3 = $html->find('td');

# output it!

echo "<rss>
<channel>
<title>Bluefin Mobile - Powerball Results</title>
<item>
<title>Powerball Results</title>
<description>";

echo "The winning Powerball numbers for ";
echo $element[0]->innertext;
echo " are ";

$number1 = str_replace("<img src=\"../images/power_balls/ball_","",$element2[20]);
echo str_replace(".gif\" width=\"34\" height=\"40\" />","",$number1);
echo ", ";

$number2 = str_replace("<img src=\"../images/power_balls/ball_","",$element2[21]);
echo str_replace(".gif\" width=\"34\" height=\"40\" />","",$number2);
echo ", ";

$number3 = str_replace("<img src=\"../images/power_balls/ball_","",$element2[22]);
echo str_replace(".gif\" width=\"34\" height=\"40\" />","",$number3);
echo ", ";

$number4 = str_replace("<img src=\"../images/power_balls/ball_","",$element2[23]);
echo str_replace(".gif\" width=\"34\" height=\"40\" />","",$number4);
echo ", ";

$number5 = str_replace("<img src=\"../images/power_balls/ball_","",$element2[24]);
echo str_replace(".gif\" width=\"34\" height=\"40\" />","",$number5);
echo ", powerball: ";

$number6 = str_replace("<img src=\"../images/power_balls/power_","",$element2[25]);
echo str_replace(".gif\" width=\"34\" height=\"40\" />","",$number6);
echo ". ";

echo $element3[58]->innertext;
echo " ";
echo $element3[59]->innertext;
echo ". ";
echo $element3[62]->innertext;
echo " ";
echo str_replace(" ","",$element3[63]->innertext);
echo ".";

echo "</description>
</item>
</channel>
<head/>
</rss>";

?>