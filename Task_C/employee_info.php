<?php 
include 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">

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
<form action="../Task_C/employee_info.php" method="post">
Keywords: <input class="w3-input w3-section w3-border" type="text" name="keyword">
<input class="w3-button w3-black w3-section" type="submit" value="Submit">
</form>
</body>
</div>

<?php 
$key = $_POST("keyword");
$conn = connect_mysql();
$sql_cmd = "SELECT * FROM Product WHERE Employee.Name LIKE '%$key%';";
$feedback=$conn->query($sql_cmd);

if(!$feedback){
    echo "Error";
}

if ($feedback->num_rows == 0) {
    echo "No result found <br>";
} else {
    echo " <br> The results are <br>";
    while($row = mysqli_fetch_assoc($feedback)){
        $userType = $row["User_type"];
        $Name = $row["Name"];
        $ID = $row["ID"];
        $userDept = $row["User_Dept"];
        echo "User_type:".$userType. "<br>";
        echo "Name:".$Name."<br>";
        echo "ID:". $ID." <br>";
        echo "UserDept:". $userDept ."<br>";
        echo "<form action='../Task_C/update_task.php' method='post'>
        <input type='submit' value= '$ID' name = 'info'>
        </form> <br> ";
        echo "<form action='../Task_C/employee_info.php' method='post'>
        <input type='submit' value='$ID' name = 'del'>
        </form> <br> ";

    }
}

?>

<?php
$del = $_POST['del'];
$sql = "DELETE FROM Employee WHERE ID ='$del';";
$conn->query($sql);
?>

<div class="w3-container w3-padding-32" id="contact">
<form action='../Task_C/add_employee.php' method='post'>
<input class="w3-button w3-black w3-section" type='submit' value='add' name = 'add'>
</form><br>
</div>

</html>