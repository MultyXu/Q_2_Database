<?php
include '../Task_C/functions.php';
$conn = connect_mysql();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update department one info</title>
</head>
<body>
    <!-- this php is used to test -->
    <?php
    $Item_number = $_POST['Item_number'];
    echo $Item_number;
    ?>

    <form action="/Task_C/update_dept_info.php" method="post">
        Enter the information here<br>
        Measurement: <input type="text" name="Measurement"><br>
        <!-- probably need a 下拉菜单for unit -->
        Unit of Measurement:<input type="text" name="Unit_of_measurement"><br> 
        Material<input type="text" name="Material"><br>
        Gross USD<input type="text" name="Gross_USD"><br>
        <input type="hidden" name="Item_number" value="<?php echo $Item_number?>">
        <input type="submit" value="Submit">
    </form> 

    <?php 
    echo "Measurement is" . $_POST["Measurement"];

        if ($_POST["Measurement"] || $_POST["Unit_of_measurement"] || $_POST["Material"] || $_POST["Gross_USD"]) {
            echo "In the if loop";
            $var1 = $_POST["Measurement"];
            $var2 = $_POST["Unit_of_measurement"];
            $var3 = $_POST["Material"];
            $var4 = $_POST["Gross_USD"];

            echo "$Item_number";
            $sql_cmd = "UPDATE Product 
                SET Measurement = $var1, 
                Unit_of_measurement = '$var2', 
                Material = '$var3', 
                Gross_USD = $var4
                WHERE 
                Item_number = '$Item_number';";
            
            if (mysqli_query($conn, $sql_cmd)) {
                echo "in the query if ";
                echo "$Item_number";
                show_all_product($conn,$Item_number);
            } else {
                echo "Error: ";
                echo $sql_cmd . "<br>" . mysqli_error($conn);
            }

            
        }
    ?>



</body>
</html>