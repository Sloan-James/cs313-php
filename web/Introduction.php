<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8"></meta>
        <title></title>
    </head>
    <body>
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
        <h1>Introduction</h1>
        <a href="Assignments.html">Assignments</a>
        <h2>James Sloan</h2>
        <p>I </p>
    </body>
</html>
