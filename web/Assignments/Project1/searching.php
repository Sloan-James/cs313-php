<?php
session_start();
unset($_SESSION["items"]);
include '../connectDatabase.php';

$class = $_POST["class"];
$race = $_POST["race"];
$expansion = $_POST["expansion"];
echo "received variables<br>";
echo $class . "<br>";
echo $race . "<br>";
echo $expansion . "<br>";

$stmt = $db->prepare("SELECT * FROM itemdb WHERE classes[:class] = '1' AND races[:race] = '1' AND expansion = :expansion");
echo "prepared statement<br>";
$stmt->bindValue(':class', $class, PDO::PARAM_INT);
$stmt->bindValue(':race', $race, PDO::PARAM_INT);
$stmt->bindValue(':expansion', $expansion, PDO::PARAM_INT);
$stmt->execute();
echo "executed statement<br>";

$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($rows as $key => $row){
    $_SESSION["items"][$key]["link"] = $row["url"];
    $_SESSION["items"][$key]["itemName"] = $row["itemname"];
}
            
header("Location: Search.php");