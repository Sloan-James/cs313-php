<!DOCTYPE html>
<?php
session_start();


?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <style>.error {color: #FF0000;}</style>
    </head>
    <body>
        <?php
            if(isset($_COOKIE["user"])){
                header("Location: My_Characters.php");
                exit;
            }
        ?>
        <form action="login.php" method="post">
            User Name: <input type="text" name="username"><br>
            Password: <input type="text" name="password"><br>
            <input type="submit" value="Sign in">
            <button formaction="signup.php">Sign up</button><br>
            <span class="signup"><?php echo $_SESSION['signup']?>
            <span class="error"><?php echo $_SESSION['error']?></span>
            
        </form>
        <br>
        <a href='Additem.php'><button>Add Items</button></a>
        <a href='Search.php'><button>Search Items</button</a>
    </body>
</html>
