<?php
session_start();
require '../connectDatabase.php';

if(empty($_POST["username"])){
    $_SESSION['error'] = "Input username and password";
    header('Location: Prove06.php');
    exit;
} else {
    $_SESSION['error'] = "";
    $user = $_POST["username"];
}

if (empty($_POST["password"])){
    $_SESSION['error'] = "Input username and password";
    header('Location: Prove06.php');
    exit;
} else {
    $_SESSION['error'] = "";
    $pass = $_POST["password"];
}

$statement = $db->query("SELECT username, password FROM users WHERE username = $user");
$row = $statement->fetchAll(PDO::FETCH_ASSOC);

$_SESSION['test'] = $_POST["password"];

// Password not currently saved securely
if( $row['password'] === $pass)
{
    setcookie("user",$user,time() + (86400 * 30), '/');
    header('Location: My_Characters.php');
    exit;
} else {
    $_SESSION['error'] = "Incorrect username/password";
    header('Location: Prove06.php');
    exit;
}
