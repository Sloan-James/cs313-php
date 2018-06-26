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
        <a href="Project01.php"><button>Back</button></a>
        <br>
        <br>
        <?php
            
            foreach ($_SESSION["items"] as $item){
                echo "<a href='" . $item["link"] ."' >". $item["itemName"] . "</a><br>";
            }
        ?>
        <span class="error"><?php echo $_SESSION["items"]["error"];?></span>
    </body>
</html>
