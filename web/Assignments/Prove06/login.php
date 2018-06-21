<?php
require '../connectDatabase.php';

if(empty($_POST["username"])){
    $_SESSION['error'] = "Incorrect username/password";
    header('Location: Prove06.php');
    exit;
} else {
    $_SESSION['error'] = "";
    $user = $_POST["username"];
}

if (empty($_POST["password"])){
    $_SESSION['error'] = "Incorrect username/password";
    header('Location: Prove06.php');
    exit;
} else {
    $_SESSION['error'] = "";
    $pass = $_POST["password"];
}

echo "test1";

$statement = $db->query("SELECT username, password FROM users WHERE username = $user");
$row = $statement->fetch(PDO::FETCH_ASSOC);


// Password not currently saved securely
if( $row['password'] == $pass)
{
    echo "test 2";
    setcookie("user",$user,time() + (86400 * 30), '/');
    header('Location: My_Characters.php');
    exit;
} else {
    echo "test 3";
    $_SESSION['error'] = "Incorrect username/password";
    header('Location: Prove06.php');
    exit;
}

