<?php

# create and load the HTML
include('simple_html_dom.php');
$html = new simple_html_dom();
$html->load_file('http://astrology.horoscope.com/horoscope/dailyhoroscope/tomorrow-career-horoscope.aspx?sign=7');
 
# get an element representing the second paragraph
$element = $html->find('div[class=fontdef1]');

# output it!

echo "<rss>
<channel>
<title>Bluefin Mobile - Career Horoscopes Libra</title>
<item>
<title>Career Horoscopes Libra </title>
<description>";

echo $element[0]->innertext;

echo "</description>
</item>
</channel>
<head/>
</rss>";

?>