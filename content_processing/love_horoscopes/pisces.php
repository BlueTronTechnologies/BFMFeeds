<?php

# create and load the HTML
include('simple_html_dom.php');
$html = new simple_html_dom();
$html->load_file('http://love.horoscope.com/astrology/tomorrow-love-horoscope-pisces.html');
 
# get an element representing the second paragraph
$element = $html->find('div[class=fontdef1]');

# output it!

echo "<rss>
<channel>
<title>Bluefin Mobile - Love Horoscopes Pisces</title>
<item>
<title>Love Horoscopes Pisces</title>
<description>";

echo $element[0]->innertext;

echo "</description>
</item>
</channel>
<head/>
</rss>";

?>