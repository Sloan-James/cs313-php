<?php
session_start();
require '../connectDatabase.php';

if(empty($_POST["username"])){
    $_SESSION['error'] = "Username/Password Required";
    header('Location: Prove06.php');
    exit;
} else {
    $_SESSION['error'] = "";
    $user = $_POST["username"];
}

if (empty($_POST["password"])){
    $_SESSION['error'] = "Username/Password Required";
    header('Location: Prove06.php');
    exit;
} else {
    $_SESSION['error'] = "";
    $pass = $_POST["password"];
}

$stmt = $db->prepare('SELECT username FROM users WHERE username = :user');
$stmt->bindValue(':user',$user, PDO::PARAM_STR);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
//$query = "SELECT username FROM users WHERE username = '" . $user . "'";
//$statement = $db->query($query);


echo $row['username'];

if($row['username'] != $user){
    // needs password encryption
    $query = "INSERT INTO users (username,password) VALUES ('" . $user . "','" . $pass . "')";
    echo $query;
    $db->query($query);
    $_SESSION['signup'] = "Sign up successful";
    header ('Location: Prove06.php');
    exit;
} else {
    $_SESSION['error'] = "Username in use";
    header('Location: Prove06.php');
    exit;
}