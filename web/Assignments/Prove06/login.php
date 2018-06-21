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

echo "test 1";
$statement = $db->query("SELECT username, password FROM users WHERE username = ':user'");
echo "test this";
$row = $statement->fetchAll(PDO::FETCH_ASSOC);

echo "test 2";

// Password not currently saved securely
if( $row['password'] === $pass)
{
    echo "test 3";
    setcookie("user",$user,time() + (86400 * 30), '/');
    header('Location: My_Characters.php');
    exit;
} else {
    echo "test 4";
    $_SESSION['error'] = "Incorrect username/password";
    header('Location: Prove06.php');
    exit;
}
