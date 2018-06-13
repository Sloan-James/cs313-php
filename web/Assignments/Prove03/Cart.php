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
        for ($i = 1; $i <= 3; $i++){
            echo "here2";
            foreach ( $_SESSION["cart"] as $key){
                echo "here2";
                if($key["qty"] > 0){
                    echo "here3";
                ?>
        <p><?php echo $key["item"];?>    
            $<?php echo $key["price"];?>     
                <?php echo $key["qty"];?>   
            $<?php echo ($key["price"] * $key["qty"]);?></p></br>
            
        <?php
                }
            }
        }
         //print_r($_SESSION);
        ?>
    </body>
</html>
