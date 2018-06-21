<?php
require '../connectDatabase.php';


    $username = $_COOKIE["user"];
    $statement = $db->prepare("SELECT userid FROM users WHERE username = :username");
    $statement->bindValue(':username', $username, PDO::PARAM_STR);
    $statement->execute();
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    $userid = $row["userid"];           


$server = $_POST["server"];
$expansion = $_POST["expansion"];
$class = $_POST["class"];
$race = $_POST["race"];
$deity = $_POST["deity"];
$name = $_POST["name"];
$level = $_POST["level"];
$str = $sta = $agi = $dex = $wis = $int = $cha = 0;
$str = $_POST["str"];
$sta = $_POST["sta"];
$agi = $_POST["agi"];
$dex = $_POST["dex"];
$wis = $_POST["wis"];
$int = $_POST["int"];
$cha = $_POST["cha"];

$stmt = $db->prepare("INSERT INTO characters (charname,server,expansion,level,class,race,deity,userid) VALUES (:name,:server,:expansion,:level,:class,:race,:deity,:userid)");
$stmt->execute(array(':name' => $name, ':server' => $server, ':expansion' => $expansion, ':level' => $level, ':class' => $class, ':race' => $race , ':deity' => $deity, ':userid' => $userid));
$stmt = $db->prepare("SELECT charid FROM characters WHERE charname = :name");
$stmt->execute(array(':name' => $name));
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$charid = $result['charid'];
$stmt = $db->prepare("INSERT INTO basestats (strength,stamina,agility,dexterity,wisdom,intellect,charisma,charid) VALUES (:str,:sta,:agi,:dex,:wis,:int,:cha,:charid)");
$stmt->execute(array(':str' => $str, ':sta' => $sta, ':agi' => $agi, ':dex' => $dex, ':wis' => $wis, ':int' => $int, ':cha' => $cha,'charid' => $charid));
header('Location: My_Characters.php');
exit;
