<?php
session_start();

$nameErr = $addressErr = $cityErr = $stateErr = $zipErr = "";
$name = $address = $city = $state = $zip = "";


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
function Test(){
    $test = true;
    
    if(empty($_POST["name"])){
        $nameErr = "Name is required";
        $test = false;
    } else {
        $name = test_input($_POST["name"]);
    }
    
    if(empty($_POST["address"])){
        $addressErr = "Address is required";
        $test = false;
    } else {
        $address = test_input($_POST["address"]);
    }
    if(empty($_POST["city"])){
        $cityErr = "City is required";
        $test = false;
    } else {
        $city = test_input($_POST["city"]);
    }
    if(empty($_POST["state"])){
        $stateErr = "State is required";
        $test = false;
    } else {
        $state = test_input($_POST["state"]);
    }
    if(empty($_POST["zip"])){
        $zipErr = "Zip Code is required";
        $test = false;
    } else {
        $zip = test_input($_POST["zip"]);
    }
    
    if($test){
        return("Confirm.php");
    } else {
        return($_SERVER["PHP_SELF"]);
    }
}


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Checkout</title>
        <style>.error {color: #FF0000;}</style>
    </head>
    <body>
        <p>Total Price: $<?php echo $_SESSION["cart"]["total"];?></p>
        <form action="<?php echo htmlspecialchars(Test());?>" method="post">
            <p>Name: <input name="name" type="text">
                <span class="error">* <?php echo $nameErr;?></span></p>
            <p>Street Address: <input name="address" type="text">
            <span class="error">* <?php echo $addressErr;?></span></p>
            <p>City: <input name="city" type="text">
            <span class="error">* <?php echo $cityErr;?></span></p>
            <p>State: <input name="state" type="text">
            <span class="error">* <?php echo $stateErr;?></span></p>
            <p>Zip Code: <input name="zip" type="text">
            <span class="error">* <?php echo $zipErr;?></span></p>
            <input type="submit" value="Submit">
        </form>
    </body>
</html>
