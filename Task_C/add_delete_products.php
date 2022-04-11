<?php 
include '../Task_C/functions.php';
# get the value from html form
$products = $_POST["all_products"];
?>
<div class="w3-top">
<div class="w3-bar w3-white w3-wide w3-padding w3-card">
<head>
Administration for **<?php echo $products; ?>** 
</head>
</div>
</div>

<div class="w3-top">
        <div class="w3-bar w3-white w3-wide w3-padding w3-card">
          <a href="../Task_B/index.html" class="w3-bar-item w3-button"><b>Q2</b> PRODUCT</a>
          <!-- Float links to the right. Hide them on small screens -->
        <div class="w3-right w3-hide-small">
            <a href="../Task_C/product.php" class="w3-bar-item w3-button">Product</a>
            <a href="../Task_B/task.php" class="w3-bar-item w3-button">Task</a>
            <a href="../Task_B/admin.html" class="w3-bar-item w3-button">Admin</a>
            <a href="TODO" class="w3-bar-item w3-button">Login</a>
        </div>
    </div>
</div>



<div class="w3-container w3-padding-32" id="contact">
<body>
<form action="/Task_C/products.php" method="post">
    Enter the product you want to add here<br>
    Item Number: <input class="w3-input w3-section w3-border" type="text" name="item_no"><br>
    Price: <input class="w3-input w3-section w3-border" type="text" name="prices"><br> 
    Quantity<input class="w3-input w3-section w3-border" type="text" name="quantity"><br>
    <input type="submit" value = "Add" class="button" name = "add">
    
</form> 

<form action="/Task_C/products.php" method="post">
    Enter the product's item number you want to delete here<br>
    Item Number: <input class="w3-input w3-section w3-border" type="text" name="item_no"><br>
    <input type="submit" value = "Delete" class="button" name = "delete">
</form> 

</body>
</div>


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
