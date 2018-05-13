<?php

$pages = scandir('web');
$notWanted = array('.','..', 'index.php');

echo '<div class="menu">';

foreach($pages as $page){
   if(!in_array($page, $notWanted)){
       $link = 'web/' . $page;
       $safeName = strtoupper(str_replace('.html', '', $page));
       echo '<a href="' . $link . '">' . $safeName . '</a>';
       
   }
}

echo '</div>';
?>

