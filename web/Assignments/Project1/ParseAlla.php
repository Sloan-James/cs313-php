<?php

echo "begin<br>";

$url = $_POST["itemLink"];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
$html = curl_exec($ch);

$dom = new DOMDocument();

$dom->loadHTML($html);
$xpath = new DomXPath($dom);
echo "finder<br>";
$item = $xpath->query('//div[@class="nobgrd"]/text()');
echo "query<br>";

echo $item[0];
echo "<br><br>";
echo $item;

