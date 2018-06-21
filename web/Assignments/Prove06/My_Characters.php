<?php
session_start();
require '../connectDatabase.php';

if (!isset($_COOKIE["user"])){
    //return to login page
    header('Location: Prove06.php');
    exit();
} else {
    $username = $_COOKIE["user"];
    $statement = $db->query("SELECT userid FROM users WHERE username = $username");
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    $userid = $row["userid"];           
}

?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if(!isset($_GET['charid'])){
            
            foreach($db->query("SELECT * FROM characters WHERE userid = $userid") as $row){
                echo "<a href='?charid=" . $row["charid"] . "'>";
                echo $row["charname"] . " (Level " . $row["level"] . " " . $row["class"] . ")";
                echo "</a><br>";
            }
        
        ?>
        <button action="?charid=0">Add new character</button>
        <?php
        // Find a way to condense these next two sections into a single section
        // but unnecessary at this time
        } elseif ($_GET['charid'] === 0) {
            echo 'Server:';
            include "Dropdownmenus/ServerList.php";
            echo '<br>Expansion:';
            include "Dropdownmenus/ExpansionList.php";
            echo '<br>Class:';
            include "Dropdownmenus/ClassList.php";
            echo '<br>Race:';
            include "Dropdownmenus/RaceList.php";
            echo '<br>Deity:';
            include "Dropdownmenus/DeityList.php";
            echo '<br><br>';
        ?>
        <form method="post" action="create.php" id="character">
            Name:
            <input type="text" name="name">
            <br>
            Level:
            <input type="text" name="level">
            <br>
            STR:
            <input type="text" name="str"><br>
            STA:
            <input type="text" name="sta"><br>
            AGI:
            <input type="text" name="agi"><br>
            DEX:
            <input type="text" name="dex"><br>
            WIS:
            <input type="text" name="wis"><br>
            INT:
            <input type="text" name="int"><br>
            CHA:
            <input type="text" name="cha"><br>
            
            <input type="submit" value="Save"><br>
        </form>
        <?php
        } else {
            $charid = $_GET['charid'];
            
            $statement = $db->query("SELECT * FROM characters WHERE userid = $charid");
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            echo 'Server: ' . $result["server"] . '<br>';
            echo 'Expansion: ' . $result["expansion"] . '<br>';
            echo 'Class: ' . $result["class"] . '<br>';
            echo 'Race: ' . $result["race"] . '<br>';
            echo 'Deity: ' . $result["deity"] . '<br>';
            
            $statement2 = $db->query("SELECT * FROM basestats WHERE userid = $charid");
            $result2 = $statement->fetchAll(PDO::FETCH_ASSOC);
            echo 'STR: ' . $result2["strength"] . '<br>';
            echo 'STA: ' . $result2["stamina"] . '<br>';
            echo 'AGI: ' . $result2["agility"] . '<br>';
            echo 'DEX: ' . $result2["dexterity"] . '<br>';
            echo 'WIS: ' . $result2["wisdom"] . '<br>';
            echo 'INT: ' . $result2["intellect"] . '<br>';
            echo 'CHA: ' . $result2["charisma"] . '<br>';
            
            //Would like to save from this screen, changes needed
            //echo '<input type="submit" value="Save">';
            
            echo '<br><br>';
            echo 'Armor: <br>';
            // Extra learning needed
            echo 'Unavailable at this time'; 
        }
        
        ?>
        
    </body>
</html>
