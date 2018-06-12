<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <p>Hello</p>
        <?php
         print_r($_SESSION);
        ?>
    </body>
</html>
