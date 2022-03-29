<?php 
include 'functions.php';
# get the value from html form
$keyword = $_POST["keyword"];
$attribute = $_POST["attribute"];
?>

Searching for **<?php echo $keyword; ?>** 
according to **<?php echo $attribute; ?>**

<br>

<?php
# connect to sql
$conn = connect_mysql();

# construct a sql query 
if ($attribute == "Price") {
    $sql_cmd = "SELECT * FROM Product WHERE $attribute = $keyword;";
} else {
    $sql_cmd = "SELECT * FROM Product WHERE $attribute LIKE '%$keyword%';";
}

# $sql_cmd = "SELECT * FROM Product;";
echo $sql_cmd; # print out the query

# store the query result in feedback
$feedback=$conn->query($sql_cmd);

# print the result on screen
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
    
        # if the value is null, it will print empty
        echo "Item_number: " . $item_number . ", Price: " . $price . ", Quantity: " .  $quantity . "<br>";
    }
}

?>