<!-- 
The page where employee enteres information for Product. 

the form should display attributes according to the employee's department
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Task_B/css/w3css.css">
    <title>update department one info</title>
</head>

    <!-- Navigation Bar -->
    <div class="w3-top">
        <div class="w3-bar w3-white w3-wide w3-padding w3-card">
          <a href="../Task_B/index.html" class="w3-bar-item w3-button"><b>Q2</b> PRODUCT</a>
          <!-- Float links to the right. Hide them on small screens -->
          <div class="w3-right w3-hide-small">
            <a href="../Task_C/product.php" class="w3-bar-item w3-button">Product</a>
            <a href="../Task_B/task.php" class="w3-bar-item w3-button">Task</a>
            <a href="TODO" class="w3-bar-item w3-button">Admin</a>
            <a href="TODO" class="w3-bar-item w3-button">Login</a>
          </div>
        </div>
    </div>

<div class="w3-container w3-padding-32" id="contact">

<body>
    <!-- this php is used to test -->
    <?php
    include '../Task_C/functions.php';
    $conn = connect_mysql();
    
    // get the dept info from the cookie
    $dept = $_COOKIE["Dept"];
    $Item_number = $_POST['Item_number'];
    echo $Item_number;
    echo "<br> You are in dept $dept <br>";

    switch ($dept) {
        case 1:
            edit_dept1($conn,$Item_number);
            //show_all_product_info($conn,$Item_number);
            break;
        case 2:
            edit_dept2($conn,$Item_number);
            break;
        case 3:
            edit_dept3($conn,$Item_number);
            break;
        case 4:
            edit_dept4($conn,$Item_number);
            break;
        default:
            echo "<br>Either you are not login, or you are not a employee <br> for test purpose, you can driect to Test/set_dept1/2/3/4.php to set a dpet cookie";
    }
    
    ?>



</body>

</div>

</html>