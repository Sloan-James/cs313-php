<!DOCTYPE html>
<?php
session_start();


?>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <style>.error {color: #FF0000;}</style>
    </head>
    <body>
        <form action="login.php" method="post">
            User Name: <input type="text" name="username"><br>
            Password: <input type="text" name="password"><br>
            <input type="submit" value="Sign in">
            <button formaction="signup.php">Sign up</button><br>
            <span class="signup"><?php echo $_SESSION['signup']?>
            <span class="error"><?php echo $_SESSION['error']?></span>
            
        </form>
        <br>
        <?php
            echo $_SESSION['test'];
            echo $_SESSION['test4'];
            echo $_SESSION['test2'];
            echo $_SESSION['test3'];
        ?>
    </body>
</html>
