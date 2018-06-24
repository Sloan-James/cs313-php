<?php

echo "begin<br>";

$html = $_POST["itemLink"];
$dom = new DOMDocument();
$dom->loadHTML($html);
$finder = new DomXPath($dom);
echo "finder<br>";
$finder->query('//div[contains(@class, "nobgrd")]');

echo "Got class nobgrd<br>";

echo $dom;
echo "<br>";
$itemLines = split('<br>',$item->innerHTML);

echo "Test<br>";
echo $itemLines;

foreach($itemLines as $line){
    echo "Test 2<br>";
    echo $line;
    echo "<br>";
}
