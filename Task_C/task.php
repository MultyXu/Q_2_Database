<?php 
include '../Task_C/functions.php';
# get the value from html form
$item_no = $_POST["item_no"];
?>




<?php
$sql_cmd = "SELECT Works_On.Emp_ID AND Product.Item_Number FROM Works_On AND Product 
            WHERE Works_On.Item_No = Product.Item_Number = $item_no";

echo $sql_cmd 
?> 



Editing for product**<?php echo $item_no; ?>** 

<form action="/Task_C/task.php" method="post">
        Enter the edit information here<br>
        Product's ID: <input type="text" name="Item_no"><br>
        Employee's ID: <input type="text" name="Emp_ID"><br>
        Due Day: <input type="text" name="ddl"><br>
        <input type="submit" value="Submit">
</form> 

    <?php 
            $var2 = $_POST["Emp_ID"];
            $var3 = $_POST["ddl"];

            echo "Updated Info";
            $sql_c = "UPDATE Works_On 
                SET Emp_ID = '$var2', 
                Due_date = '$var3', 
                WHERE 
                Item_No = '$item_no';";
            
            if (mysqli_query($conn, $sql_c)) {
                $sql = "SELECT * FROM Works_On;";
                echo $sql;

            } else {
                echo "Error: ";
                echo $sql_c . "<br>" . mysqli_error($conn);
            }

            
        
    ?>