<?php 
include '../Task_C/functions.php';
# get the value from html form
$products = $_POST["all_products"];
?>

Searching for **<?php echo $products; ?>** 




<form action="/Task_C/products.php" method="post">
    Enter the product you want to add here<br>
    Item Number: <input type="text" name="item_no"><br>
    Price: <input type="text" name="prices"><br> 
    Quantity<input type="text" name="quantity"><br>
    <input type="submit" value = "Add" class="button" name = "add">
    
</form> 

<form action="/Task_C/products.php" method="post">
    Enter the product's item number you want to delete here<br>
    Item Number: <input type="text" name="item_no"><br>
    <input type="submit" value = "Delete" class="button" name = "delete">
</form> 

<?php
$itemno = $_POST['item_no'];
$price = $_POST['prices'];
$quantity = $_POST['quantity'];
if(array_key_exists('add', $_POST)) {
    $conn->query("INSERT INTO Product(Item_number, Price, Quantity) VALUES ($itemno, $price, $quantity ); ");
}
if (array_key_exists('delete', $_POST)) {
    $delItemNo = $_POST['item_no'];
    $conn->query("DELETE FROM Product WHERE Item_number = '$delItemNo';");
}
?>
