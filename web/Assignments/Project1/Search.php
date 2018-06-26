<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Search</title>
    </head>
    <body>
        <form method='post' action='searching.php'>
            <?php
                include 'Dropdownmenus/ClassList.php';
                echo "<br>";
                include 'Dropdownmenus/RaceList.php';
                echo "<br>";
                include 'Dropdownmenus/ExpansionList.php';
                echo "<br>";
            ?>
            <input type='submit' value='Search'>
        </form>
        <br>
        <br>
        <?php
            foreach ($_SESSION["items"] as $item){
                echo "<a src='" . $item["url"] ."' >". $item["itemName"] . "</a><br>";
            }
        ?>
    </body>
</html>
