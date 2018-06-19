<?php
require '../connectDatabase.php';

if (isset($_GET['userid'])){
    echo "something";
    $id = $_GET['userid'];
}

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
            $stmt = $db->query('SELECT * FROM characters');
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)){
                if ($row['userid'] == $id){
                    echo 'Char Name: ' . $row['charname'];
                    echo ' Server: ' . $row['server'];
                    echo ' Expansion: ' . $row['expansion'];
                    echo ' Level: ' . $row['level'];
                    echo ' Class: ' . $row['class'];
                    echo ' Race: ' . $row['race'];
                    echo ' Deity: ' . $row['deity'];
                    echo ' <a href="basestats.php?charid=' . $row['charid'] . '">Base Stats</a>';
                }
            }
        ?>
    </body>
</html>
