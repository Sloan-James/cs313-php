<?php

// simple_html_dom is authored by S.C. Chen received from http://simplehtmldom.sourceforge.net/
include "simple_html_dom.php";

$url = $_POST["itemLink"];
$html = new simple_html_dom();
$html->load_file($url);

$item = $html->find('.nobgrd', 0)->innertext;

$lines = split("<br>",$item);

foreach ($lines as $line){
    echo $line;
    echo "<br><br>";
}


