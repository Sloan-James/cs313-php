<?php

echo "begin<br>";

$html = $_POST["itemLink"];
$dom = new DOMDocument();
$dom->loadHTML($html);
$xpath = new DomXPath($dom);
echo "finder<br>";
$items = $xpath->query('//div[contains(@class, "nobgrd")]');

foreach ($items as $item){
    echo "<br/>[". $item->nodeName. "]";
    
}

foreach($itemLines as $line){
    echo "Test 2<br>";
    echo $line;
    echo "<br>";
}
