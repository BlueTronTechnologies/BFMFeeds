<?php

# create and load the HTML
include('simple_html_dom.php');
$html = new simple_html_dom();
$html->load_file('http://mydorpie.com/m/?page=tv_sabc2_today');
 
# get an element representing the second paragraph
$element = $html->find('div[id=blp]');

# output it!

echo "<rss>
<channel>
<title>Bluefin Mobile - SABC 2</title>
<item>
<title>SABC 2</title>
<description>";

$full_value = "";

foreach ($element as $value) {
	
	if (substr($value->innertext,3,2) >= 17) {

  		$value1 = str_replace("<b>","",$value->innertext);
		$value2 = str_replace("</b> "," - ",$value1);
		$full_value = $full_value.$value2;
		$full_value = $full_value.", ";
	}
}

echo substr($full_value, 0, -2);

echo "</description>
</item>
</channel>
<head/>
</rss>";

?>