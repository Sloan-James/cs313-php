<?php
session_start();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Confirm</title>
    </head>
    <body>
        <?php
            foreach ($_SESSION["cart"] as $key){
                if($key["qty"] > 0){
                ?>
        <p><?php echo $key["item"];?> X <?php echo $key["qty"];?></p>
                <?php
                
                }
                
                }?>
      
        <p>Total Price: <?php echo $_SESSION["cart"]["total"]; ?></p>
        <p>Your order has been completed. Your purchase will be shipped to:</p>
        <p><?php echo $_SESSION["form_data"]["name"];?></p>
        <p><?php echo $_SESSION["form_data"]["address"];?></p>
        <p><?php echo $_SESSION["form_data"]["city"];?>, 
            <?php echo $_SESSION["form_data"]["state"];?> 
                <?php echo $_SESSION["form_data"]["zip"];?></p>
        
    </body>
</html>
