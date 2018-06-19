<?php
require '../connectDatabase.php';
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        echo 'Class:';
        include "ClassList.php";
        echo 'Race:';
        include "RaceList.php";
        echo 'Progression:';
        include "ExpansionList.php";
        echo 'Deity:';
        include "DeityList.php";
        echo '<br><br>';
        ?>
        <!--
        <form action="login.php" method="post">
            User Name: <input type="text" name="username"><br>
            Password: <input type="text" name="password"><br>
            <input type="submit" value="Submit">
        </form> -->
        
        <?php
            echo 'All users:';
            foreach ($db->query('SELECT username, userid FROM users') as $row) {
                echo 'user: ' . $row['username'];
                echo ' userid: ' . $row['userid'];
                echo ' <a href="characters.php?userid=' . $row['userid'] . '">Characters</a>';
                echo '<br/>';
            }
        ?>
    </body>
</html>
