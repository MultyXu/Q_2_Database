<?php 
include 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">

<div class="w3-top">
        <div class="w3-bar w3-white w3-wide w3-padding w3-card">
          <a href="../Task_B/index.html" class="w3-bar-item w3-button"><b>Q2</b> PRODUCT</a>
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
<form action="/Task_C/add_employee.php" method="post">
    Enter the Employee you want to add here<br>
    User type: <input class="w3-input w3-section w3-border"  type="text" name="user_type"><br>
    Name: <input class="w3-input w3-section w3-border"  type="text" name="name"><br> 
    ID: <input class="w3-input w3-section w3-border"  type="text" name="ID"><br>
    User department: <input class="w3-input w3-section w3-border"  type="text" name="user_dept"><br>
    <input type="submit" class="button" name = "submit">
</form> 

</body>
</div>


<?php
$name = $_POST['name'];
$user_type = $_POST['user_type'];
$ID = $_POST['ID'];
$user_dept = $_POST['user_dept'];
$sql = "INSERT INTO Employee('User_type', 'Name', 'ID', 'User_Dept') VALUES ($user_type, $name, $ID, $user_dept);" ;
$conn->query($sql);
?>


</html>