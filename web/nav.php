<?php
    $pages = scandir('.');
    $notWanted = array('.','..', 'index.php', 'nav.php', 'introduction.css', 'nav.css');

    echo '<ul class="menu">';

    foreach($pages as $page){
       if(!in_array($page, $notWanted)){
           $link = $page;
           $safeName = strtoupper(str_replace('.php', '', $page));
           echo '<li><a href="' . $link . '">' . $safeName . '</a></li>';

       }
    }

    echo '</ul>';
?>

