<?php

$html = $_POST("itemLink");

$dom = new DOMDocument;
$dom->loadHTML($html);
$item = $dom->getElementsByClassName("nobgrd");

echo "Test 4";

$itemLines = split('<br>',$item);

echo "Test";
echo $itemLines;

foreach($itemLines as $line){
    echo "Test 2";
    echo $line;
    echo "<br>";
}
