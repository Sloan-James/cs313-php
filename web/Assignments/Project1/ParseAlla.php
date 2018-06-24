<?php

echo "begin";

$html = $_POST("itemLink");

$dom = new DOMDocument;
$dom->loadHTML($html);

echo "loaded html";

$item = $dom->getElementsByClassName("nobgrd");

echo "Got class nobgrd";

$itemLines = split('<br>',$item);

echo "Test";
echo $itemLines;

foreach($itemLines as $line){
    echo "Test 2";
    echo $line;
    echo "<br>";
}
