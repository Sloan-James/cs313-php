<?php

echo "begin<br>";

$html = $_POST["itemLink"];
echo "retrieve post<br>";
$dom = new DOMDocument();
echo "new Document<br>";
$dom->loadHTML($html);

echo "loaded html<br>";

$item = $dom->getElementsByTagName("nobgrd");

echo "Got class nobgrd<br>";

$itemLines = split('<br>',$item);

echo "Test<br>";
echo $itemLines;

foreach($itemLines as $line){
    echo "Test 2<br>";
    echo $line;
    echo "<br>";
}
