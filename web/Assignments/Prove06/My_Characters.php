<?php
session_start();
require '../connectDatabase.php';

if (!isset($_COOKIE["user"])){
    //return to login page
    header('Location: Prove06.php');
    exit();
} else {
    $username = $_COOKIE["user"];
    $statement = $db->prepare("SELECT userid FROM users WHERE username = :username");
    $statement->bindValue(':username', $username, PDO::PARAM_STR);
    $statement->execute();
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
            $statement = $db->prepare("SELECT * FROM characters WHERE userid = :userid");
            $statement->bindValue(':userid', $userid, PDO::PARAM_INT);
            $statement->execute();
                    
            while($row = $statement->fetch(PDO::FETCH_ASSOC)){
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
            
            $statement = $db->prepare("SELECT * FROM characters WHERE charid = :charid");
            $statement->bindValue(':charid',$charid,PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            echo 'Server: ' . $result["server"] . '<br>';
            echo 'Expansion: ' . $result["expansion"] . '<br>';
            echo 'Class: ' . $result["class"] . '<br>';
            echo 'Race: ' . $result["race"] . '<br>';
            echo 'Deity: ' . $result["deity"] . '<br>';
            
            $statement = $db->prepare("SELECT * FROM basestats WHERE charid = :charid");
            $statement->bindValue(':charid',$charid,PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            echo 'STR: ' . $result["strength"] . '<br>';
            echo 'STA: ' . $result["stamina"] . '<br>';
            echo 'AGI: ' . $result["agility"] . '<br>';
            echo 'DEX: ' . $result["dexterity"] . '<br>';
            echo 'WIS: ' . $result["wisdom"] . '<br>';
            echo 'INT: ' . $result["intellect"] . '<br>';
            echo 'CHA: ' . $result["charisma"] . '<br>';
            
            //Would like to save from this screen, changes needed
            //echo '<input type="submit" value="Save">';
            
            echo '<br><br>';
            echo 'Armor: <br>';
            // Extra learning needed
            echo 'Unavailable at this time'; 
        }
        
        ?>
        <button formmethod="post" name="logout">Log out</button>
        <?php
        if(array_key_exists('logout',$_POST)){
            setcookie("user","",time() - 3600);
            header("Location: Prove06.php");
        }
        
        ?>
    </body>
</html>
