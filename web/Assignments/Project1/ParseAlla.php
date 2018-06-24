<?php

echo "begin";

$html = $_POST["itemLink"];
echo "retrieve post";
$dom = new DOMDocument();
echo "new Document";
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
