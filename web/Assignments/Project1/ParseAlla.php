<?php

echo "begin<br>";

$html = $_POST["itemLink"];
$dom = new DOMDocument();
$dom->loadHTML($html);
$xpath = new DomXPath($dom);
echo "finder<br>";
$items = $xpath->query('//div[@class="nobgrd"]');
echo "query<br>";
$item = $items->item(0);
echo "item 1<br>";
$test = $item->innerHTML;
echo "innerhtml<br>";

echo $test;

foreach($itemLines as $line){
    echo "Test 2<br>";
    echo $line;
    echo "<br>";
}
