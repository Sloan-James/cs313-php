<?php
session_start();
$_SESSION["item"] = $_POST["item"];
$_SESSION["item"]["price"] = $_POST["price"];

$_SESSION[1]["qty"] = 0;

//Add
if (isset($_GET["add"])){
    $i = $_GET["add"];
    $qty = $_SESSION[$i]["qty"] + 1;
    $_SESSION[$i]["item"] = $_POST["item"];
    $_SESSION[$i]["cart"] = $i;
    $_SESSION[$i]["qty"] = $qty;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            img {
                width: 150px;
                height: 150px;
            }
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
            }
        </style>
    </head>
    <body>
        <form action="Cart.php" method="post">
        <form action="Browse.php" method="post">
            <table style="width:100%">
                <tr>
                    <th>Item</th>
                    <th>Price</th>
                </tr>
                <tr>
                <form action="addCart.php" method="post">
                    <td name='item'>Camera <img src="product-images/camera.jpg"></td>
                    <td name='price'>$1,500</td>
                    <td><a href="?add=1">Add to Cart</a><input type="submit" value="Add to Cart"></td>
                </form>
                </tr>
                <tr>
                <form action="addCart.php" method="post">
                    <td name='item'>External Hard Drive<img src="product-images/external-hard-drive.jpg"></td>
                    <td name='price'>$800</td>
                    <td><input type="submit" value="Add to Cart"></td>
                </form>
                </tr>
                <tr>
                <form action="addCart.php" method="post">
                    <td name='item'>Wrist Watch<img src="product-images/watch.jpg"></td>
                    <td name='price'>$300</td>
                    <td><input type="submit" value="Add to Cart"></td>
                </form>
                </tr>
            </table>
        </form>
            <input type="submit" value="View Cart">
        </form>
    </body>
</html>
