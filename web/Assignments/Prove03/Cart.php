<?php
session_start();
$_SESSION["cart"]["total"] = 0;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cart</title>
    </head>
    <body>
        <p>Cart</p>
        <table>
            <tr>
                <th>Item</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
            </tr>
        <?php
            foreach ( $_SESSION["cart"] as $key){
                if($key["qty"] > 0){
                ?>
            <tr>
                <td><?php echo $key["item"];?></td>
                <td>$<?php echo $key["price"];?></td>
                <td><?php echo $key["qty"];?></td>
                <td>$<?php 
                        $itemTotal = $key["price"] * $key["qty"];
                        $_SESSION["cart"]["total"] = $_SESSION["cart"]["total"] + $itemTotal;
                        echo ($itemTotal);?></td>
            </tr>
        <?php
                }
            }
         //print_r($_SESSION);
        ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>Total Price:<br>$<?php echo $_SESSION["cart"]["total"];?></td>
            </tr>
        </table>
        <form action="Checkout.php">
            <input type="submit" value="Checkout">
        </form>
    </body>
</html>
