<?php 
# get the value from html form
$keyword = $_POST["keyword"];
$attribute = $_POST["attribute"];
?>

Searching for **<?php echo $keyword; ?>** 
according to **<?php echo $attribute; ?>**

<br>

<?php
# connect to sql, need to change the servername & username if necessary
$servername = "localhost";
$username = "root";
$password = ""; # no password

$conn = new mysqli($servername,$username,$password);
if ($conn->connect_error){
    die("Connect error" . $connect->connect_error);
} else {
    echo "Connect to mysql <br>";
}

# use a database
$sql_cmd="use Q2_DB;";
$feedback=mysqli_query($conn,$sql_cmd);
if(!$feedback){
    echo "Error Can Not use the databse";
} else {
    echo "successfully use Q2_DB <br>";
}

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