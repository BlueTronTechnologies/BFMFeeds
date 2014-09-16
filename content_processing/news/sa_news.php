<?php

# create and load the HTML
include('simple_html_dom.php');
$html = new simple_html_dom();
$html->load_file('http://mg.co.za/section/news-national/');
 
# get an element representing the second paragraph
$element = $html->find('a');
$element2 = $html->find('p');

# output it!

echo "<rss>
<channel>
<title>Bluefin Mobile - SA News</title>
<item>
<title>SA News</title>
<description>";

echo $element[39]->innertext;
echo " - ";
echo $element2[1]->innertext;
echo " MTN Play and mg.co.za ";

echo "</description>
</item>
</channel>
<head/>
</rss>";

?>