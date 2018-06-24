<?php

echo "begin<br>";

$html = $_POST["itemLink"];
$dom = new DOMDocument();
$dom->loadHTML($html);
$xpath = new DomXPath($dom);
echo "finder<br>";
$item = $xpath->query('//div[@class="nobgrd"]/text()');
echo "query<br>";

echo $item[0];
echo "<br><br>";
echo $item;

