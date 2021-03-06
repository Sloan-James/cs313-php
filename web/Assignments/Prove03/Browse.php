<?php
session_start();
//$_SESSION["item"] = $_POST["item"];
//$_SESSION["item"]["price"] = $_POST["price"];
if( !isset($_SESSION["cart"]["qty"])){
    $_SESSION["cart"]["qty"] = 0;
}

$products[1]["item"] = "Camera";
$products[2]["item"] = "External Hard Drive";
$products[3]["item"] = "Wrist Watch";
$products[1]["price"] = 1500;
$products[2]["price"] = 800;
$products[3]["price"] = 300;



//Add
if (isset($_GET['add'])){
    $i = $_GET['add'];
    if(!isset($_SESSION["cart"][$i])){
        $_SESSION["cart"][$i]["qty"] = 0;
        $_SESSION["cart"][$i]['item'] = $products[$i]["item"];
        $_SESSION["cart"][$i]['price'] = $products[$i]["price"];
    }
    $_SESSION["cart"][$i]['qty']++;
    $_SESSION["cart"]["qty"]++;
}

//Delete
if (isset($_GET["delete"])){
    $i = $_GET["delete"];
    if ($_SESSION["cart"][$i]["qty"] > 0){   
        $_SESSION["cart"][$i]["qty"]--;
        $_SESSION["cart"]["qty"]--;
    } else{
        unset($_SESSION["cart"][$i]);
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Browse Items</title>
        <style>
            img {
                width: 150px;
                height: 150px;
            }
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
                width: 33%;
            }
        </style>
    </head>
    <body>
        <form action="Cart.php" method="post">
            <table style="width:100%">
                <tr>
                    <th>Item</th>
                    <th>Price</th>
                </tr>
                <tr>
                    <td name='item'>Camera <img src="product-images/camera.jpg"></td>
                    <td name='price'>$1,500</td>
                    <td>
                        <a href="?add=1">Add to Cart</a><br>
                        Quantity: <?php echo $_SESSION["cart"][1]["qty"]; ?><br>
                        <?php if($_SESSION["cart"][1]["qty"] > 0 ){?>
                            <a href="?delete=1">Delete from cart</a>
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <td name='item'>External Hard Drive<img src="product-images/external-hard-drive.jpg"></td>
                    <td name='price'>$800</td>
                    <td>
                        <a href="?add=2">Add to Cart</a><br>
                        Quantity: <?php echo $_SESSION["cart"][2]["qty"]; ?><br>
                        <?php if($_SESSION["cart"][2]["qty"] > 0 ){?>
                            <a href="?delete=2">Delete from cart</a>
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <td name='item'>Wrist Watch<img src="product-images/watch.jpg"></td>
                    <td name='price'>$300</td>
                    <td>
                        <a href="?add=3">Add to Cart</a><br>
                        Quantity: <?php echo $_SESSION["cart"][3]["qty"]; ?><br>
                        <?php if($_SESSION["cart"][3]["qty"] > 0 ){?>
                            <a href="?delete=3">Delete from cart</a>
                        <?php } ?>
                    </td>
                </tr>
            </table>
            <input type="submit" value="View Cart">
            <p>There are <?php echo $_SESSION["cart"]["qty"]; ?> items in the cart</p>
        </form>
    </body>
</html>
