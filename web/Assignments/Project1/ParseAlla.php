<?php

include "simple_html_dom.php";

$url = $_POST["itemLink"];

$html = new simple_html_dom();

echo "create object<br>";

$html->load_file($url);

echo "load url<br>";

$item = $html->find('.nobgrd', 0)->innertext;

echo "find nobgrd class<br>";
echo "<br><br>";
echo $item;


