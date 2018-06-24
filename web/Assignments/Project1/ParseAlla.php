<?php

$dom = new DOMDocument;
$dom->loadHTML($html);
$item = $dom->getElementsByClassName("nobgrd");

$itemLines = split('<br>',$item);

echo "Test";
echo $itemLines;

foreach($itemLines as $line){
    echo "Test 2";
    echo $line;
    echo "<br>";
}
