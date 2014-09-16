<?php

# create and load the HTML
include('simple_html_dom.php');
$html = new simple_html_dom();
$html->load_file('http://open.live.bbc.co.uk/weather/feeds/en/6297016/3dayforecast.rss');
 
# get an element representing the second paragraph
$element = $html->find('description');

# output it!

echo "<rss>
<channel>
<title>Bluefin Mobile - SA News</title>
<item>
<title>SA News</title>
<description>";
echo $element[1];
echo "</description>
</item>
</channel>
<head/>
</rss>";

?>