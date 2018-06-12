<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="addCart.php" method="post">
            <table>
                <tr>
                    <th>Item</th>
                    <th>Price</th>
                </tr>
                <tr>
                <form action="addCart.php" method="post">
                    <td name='item'>Camera <img src="product-images/camera.jpg"></td>
                    <td name='price'>$1,500</td>
                    <td><input type="submit" value="Add to Cart"></td>
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
    </body>
</html>
