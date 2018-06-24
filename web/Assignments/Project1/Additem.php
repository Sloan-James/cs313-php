<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Item</title>
    </head>
    <body>
        <h1>Add Items</h1>
        <strong>Please check that the expansion dropdown shows the correct expansion for the item you're adding.</strong>
        <form id="" method="post" action="ParseAlla.php">
            <input name="itemLink" style="width: 500px;" autocomplete="off" type="text">
            <br>
            <br>
            Expansion:
            <br>
            <?php include "Dropdownmenus/ExpansionList.php";?>
            <br>
            <br>
            <input type="submit" value="Save">
        </form>
    </body>
</html>
