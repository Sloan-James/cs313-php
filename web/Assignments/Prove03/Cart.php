<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cart</title>
    </head>
    <body>
        <p>Cart</p>
        <?php
            foreach ( $_SESSION["cart"] as $key){
                if($key["qty"] > 0){
                ?>
        <p><?php echo $key["item"];?>    
            $<?php echo $key["price"];?>     
                <?php echo $key["qty"];?>   
            $<?php echo ($key["price"] * $key["qty"]);?></p>
            
        <?php
                }
            }
         //print_r($_SESSION);
        ?>
    </body>
</html>
