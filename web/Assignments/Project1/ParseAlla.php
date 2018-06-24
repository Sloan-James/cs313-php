<?php

echo "begin<br>";

$html = $_POST["itemLink"];
$dom = new DOMDocument();
$dom->loadHTML($html);
$xpath = new DomXPath($dom);
echo "finder<br>";
$item = $xpath->query('string(//div[@class="nobgrd"])');
echo "query<br>";

echo $item;


