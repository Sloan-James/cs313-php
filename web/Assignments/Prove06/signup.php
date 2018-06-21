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

$statement = $db->query("SELECT username, password FROM users WHERE username = $user");
$row = $statement->fetch(PDO::FETCH_ASSOC);

if($row['username'] != $user){
    // needs password encryption
    $db->query("INSERT INTO 'users' ('user','password') VALUES ('$user','$pass')");
    $_SESSION['signup'] = "Sign up successful";
    header ('Location: Prove06.php');
    exit;
} else {
    $_SESSION['error'] = "Username in use";
    header('Location: Prove06.php');
    exit;
}