<?php
require '../connectDatabase.php';

if (isset($_GET['charid'])){
    $id = $_GET['charid'];
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
            foreach($db->query('SELECT * FROM basestats') as $row){
                if($row['charid'] == $id){
                    echo '<table><tr><th>STR</th><th>STA</th><th>AGI</th><th>DEX</th><th>WIS</th><th>INT</th><th>CHA</th></tr>';
                    echo '<tr><td>' . $row['strength'];
                    echo '</td><td>' . $row['stamina'];
                    echo '</td><td>' . $row['agility'];
                    echo '</td><td>' . $row['dexterity'];
                    echo '</td><td>' . $row['wisdom'];
                    echo '</td><td>' . $row['intellect'];
                    echo '</td><td>' . $row['charisma'];
                    echo '</td></tr></table>';
                }
            }
                
        ?>
    </body>
</html>
