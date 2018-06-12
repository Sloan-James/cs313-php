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
         echo $_SESSION[0]["item"];
        ?>
    </body>
</html>
