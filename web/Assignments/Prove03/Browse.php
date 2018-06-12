<?php
    session_start();
    include items.php;
    $product = new Product();
    $productArray = $product->getAllProduct();
    
    //Load
    if ( !isset($_SESSION["total"])){
        for ($i=0; $i< count($productArray); $i++){
            $_SESSION["qty"][$i] = 0;
            $_SESSION["amounts"][$i] = 0;
        }
    }
    
    //ADD
    if ( isset($_GET["add"])){
        $i = $_GET["add"];
        $qty = $_SESSION["qty"][$i] + 1;
        $_SESSION["amounts"][$i] = $amounts[$i] * $qty;
        $_SESSION["cart"][$i] = $i;
        $_SESSION["qty"][$i] = $qty;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php 
            foreach (productArray as $item => $value){
        ?>
        <div class="product-item">
            <form id="frmCart">
                <div class="product-image">
                    <img src="<?php echo $productArray[$item]["image"]; ?>">
                </div>
                <div>
                    <div class="product-info">
                        <strong><?php echo $productArray[$item]["name"]; ?></strong>
                    </div>
                    <div class="product-info product-price"><?php echo "$".$productArray[$item]["price"]; ?></div>
                    <div class="product-info">
                        <a href="?add=<?php echo $productArray[$item]["id"]; ?>">Add to Cart</a>
                    </div>
                </div>
            </form>
        </div>
        <?php
            
            }
        ?>
    </body>
</html>
