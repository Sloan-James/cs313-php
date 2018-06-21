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
        <a href="?charid=0"><button>Add new character</button></a>
        <?php
        // Find a way to condense these next two sections into a single section
        // but unnecessary at this time
        } elseif ($_GET['charid'] === 0) {
            echo 'Server:';
            include("Dropdownmenus/ServerList.php");
            echo '<br>Expansion:';
            include("Dropdownmenus/ExpansionList.php");
            echo '<br>Class:';
            include("Dropdownmenus/ClassList.php");
            echo '<br>Race:';
            include( "Dropdownmenus/RaceList.php");
            echo '<br>Deity:';
            include("Dropdownmenus/DeityList.php");
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
        echo "<a href='My_Characters.php'><button>Back to Characters</button></a>";
        } else {
            $charid = $_GET['charid'];
            
            $statement = $db->prepare("SELECT * FROM characters WHERE charid = :charid");
            $statement->bindValue(':charid',$charid,PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            echo 'Name: ' . $result["charname"] . '<br>';
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
            echo "<a href='My_Characters.php'><button>Back to Characters</button></a>";
        }
        
        ?>
        
        <form method="post" action="logout.php">
            <input type="submit" value="logout">
        </form>
    </body>
</html>
