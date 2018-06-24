<?php

$dom = new DOMDocument;
$dom->loadHTML($html);
$item = $dom->getElementsByClassName("nobgrd");

$itemLines = split('<br>',$item);

foreach($itemLines as $line){
    echo $line;
    echo "<br>";
}
