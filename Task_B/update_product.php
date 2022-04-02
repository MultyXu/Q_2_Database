<!-- show all the existing product with basic information -->

<!-- when cliking on the product ID or Name, redirect to the page that edit this product -->

<!-- cookies, sessions needed to pass the parameter  -->

<?php
include '../Task_C/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update_product</title>

<?php 
$conn = connect_mysql();

$sql_cmd = "SELECT * FROM Product";

$feedback=$conn->query($sql_cmd);
if(!$feedback){
    echo "Error";
}

if ($feedback->num_rows == 0) {
    echo "No result found <br>";
} else {
    echo "The results are <br>";
    while($row = mysqli_fetch_assoc($feedback)){
        $item_number = $row["Item_number"];
        $price = $row["Price"];
        $quantity = $row["Quantity"];
    
        // use the form with hidden attribute to redirect to the another
        echo "Item_number: " . $item_number . ", Price: " . $price . ", Quantity: " .  $quantity . " <form action='../Task_C/update_dept_info.php' method='post'>
        <input type='hidden' name='Item_number' value='$item_number'>
        <input type='submit' value='edit'>
        </form> <br> ";
    }
}
?>
</head>
<body>
    
</body>
</html>