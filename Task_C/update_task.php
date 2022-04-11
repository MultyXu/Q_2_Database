

<!DOCTYPE html>
<html lang="en">

<?php 
include '../Task_C/functions.php';
$employeeID = $_POST['info'];
$conn = connect_mysql();
?>

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


<?php

$sql_cmd = "SELECT Name AND Address FROM User
            WHERE User.ID = $employeeID ";
$feedback=$conn->query($sql_cmd);
if(!$feedback){
    echo "Error";
}

if ($feedback->num_rows == 0) {
    echo "No result found <br>";
} else {
    echo " <br> The results are <br>";
    while($row = mysqli_fetch_assoc($feedback)){
        $Name = $row["Name"];
        $ID = $row["ID"];
        echo "Name:".$Name;
        echo "ID:". $ID." <br>";
    }
}
?> 


<div class="w3-top">
<div class="w3-bar w3-white w3-wide w3-padding w3-card">
<body>
Works On:
</body>
</div>
</div>

<?php
$sql_cmd1 = "SELECT Works_On.Item_No FROM Works_On
WHERE Works_On.Emp_ID = $employeeID";
$feedback1=$conn->query($sql_cmd1);

if(!$feedback1){
    echo "Error";
}

if ($feedback1->num_rows == 0) {
    echo "No result found <br>";
} else {
    echo " <br> The results are <br>";
    while($row = mysqli_fetch_assoc($feedback1)){
        $item = $row["Item_No"];
        echo "Item:". $item." <br>";
        echo "<form action='../Task_C/update_task.php' method='post'>
        <input type='submit' value='$item' name = 'delete'>
        </form> <br> ";

    }
}
?> 
<?php
$del_itemNo = $_POST['delete'];
$sql = "DELETE FROM Works_On WHERE Emp_ID = $employeeID AND Item_number = '$del_itemNo';";
$conn->query($sql);
?>


<div class="w3-container w3-padding-32" id="contact">
<body>
<form action='../Task_B/product.php' method='post'>
    <input class="w3-input w3-section w3-border" type='submit' value='add' name = 'Add Task'>
</form> <br> 
</body>
</div>

 </html>