<?php
function connect_mysql(){
    // connect to sql, need to change the servername & username if necessary
    $servername = "localhost";
    $username = "root";
    $password = ""; // no password

    $conn = new mysqli($servername,$username,$password);
    
    if ($conn->connect_error){
        die("Connect error" . $conn->connect_error);
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

    return $conn;
}


function show_all_product_info($conn,$Item_number) {
    // show all the information about the product
    $sql_cmd = "SELECT * FROM Product WHERE Item_number = '$Item_number';";
    
    $feedback=$conn->query($sql_cmd);

    if ($feedback->num_rows > 0) {
        echo "information retrived ";

        while($row = mysqli_fetch_assoc($feedback)){
            echo "start to print info ";
            // Basic info
            $item_number = $row["Item_number"];
            $price = $row["Price"];
            $quantity = $row["Quantity"];

            // dept 1
            $Measurement = $row["Measurement"];
            $Unit_of_measurement = $row["Unit_of_measurement"];
            $Material = $row["Material"];
            $Gross_USD = $row["Gross_USD"];

            // dept 2
            $Payment_term = $row["Payment_term"];
            $Purchase_price = $row["Purchase_price"];
            $Currency  = $row["Currency"];

            // dept 3
            $Item_type_code = $row["Item_type_code"];
            $D_line_item_category = $row["D_line_item_category"];
            $Product_code = $row["Product_code"];
            $Country_of_origin = $row["Country_of_origin"];
            
            //dept 4
            $Manufacturing_policy = $row["Manufacturing_policy"];
            $Routing_No = $row["Routing_No"];
            $Reordering_policy = $row["Reordering_policy"];

        
            // print all the information
            echo "<br> Item_number: $item_number, Price: $price, Quantity: $quantity <br> 
            
            Dept 1 -- Measurement: $Measurement, Unit_of_measurement: $Unit_of_measurement, Material:$Material, Gross_USD: $Gross_USD <br>
            
            Dept 2 -- Payment_term: $Payment_term, Purchase_price: $Purchase_price, Currency: $Currency <br>
            
            Dept 3 -- Item_type_code: $Item_type_code, D_line_item_category: $D_line_item_category, Product_code: $Product_code, Country_of_origin: $Country_of_origin <br>
            
            Dept 4 -- Manufacturing_policy: $Manufacturing_policy, Routing_No: $Routing_No, Reordering_policy: $Reordering_policy <br><br>";
        }

    } else {
        echo "Failed ";
        echo "Error: " . $sql_cmd . "<br>" . mysqli_error($conn);
    }
}

function update_dept_info($conn,$Item_number,$dept) {
    
    // a better way is to create view and get the table attribute, to write less copied code
    
    switch ($dept) {
        case "dept_1":
            break;
        case "dept_2":
            break;
        case "dept_3":
            break;
        case "dept_4":
            break;
        default:
            // default case may should change, and and add admin case

    }
}


//----------------------------–––––---------–––––------
// update dept info code
//update dept 1 info
function edit_dept1($conn, $Item_number) {
    echo "Measurement is" . $_POST["Measurement"];

    echo "
    <form action='/Task_C/update_dept_info.php' method='post'>
        Enter the information here<br>
        Measurement: <input type='text' name='Measurement'><br>
        <!-- probably need a 下拉菜单for unit -->
        Unit of Measurement:<input type='text' name='Unit_of_measurement'><br> 
        Material<input type='text' name='Material'><br>
        Gross USD<input type='text' name='Gross_USD'><br>
        <input type='hidden' name='Item_number' value='$Item_number'>
        <input type='submit' value='Submit'>
    </form> 
    ";

    if ($_POST["Measurement"] & $_POST["Unit_of_measurement"] & $_POST["Material"] & $_POST["Gross_USD"]) {
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
            show_all_product_info($conn,$Item_number);
        } else {
            echo "Error: ";
            echo $sql_cmd . "<br>" . mysqli_error($conn);
        }

        
    } else {
        echo "<br>Please enter all the information.";
    }
}

// update dept 2 info
function edit_dept2($conn, $Item_number) {
    echo "Payment_term is " . $_POST["Purchase_price"];

    echo "
    <form action='/Task_C/update_dept_info.php' method='post'>
        Enter the information here<br>
        Payment_term: <input type='text' name='Payment_term'><br>
        Purchase_price:<input type='text' name='Purchase_price'><br> 
        Currency:<input type='text' name='Currency'><br>
        
        <input type='hidden' name='Item_number' value='$Item_number'>
        <input type='submit' value='Submit'>
    </form> 
    ";

    if ($_POST["Payment_term"] & $_POST["Purchase_price"] & $_POST["Currency"]) {
        echo "In the if loop";
        $var1 = $_POST["Payment_term"];
        $var2 = $_POST["Purchase_price"];
        $var3 = $_POST["Currency"];

        echo "$Item_number";
        $sql_cmd = "UPDATE Product 
            SET Payment_term = $var1, 
            Purchase_price = $var2, 
            Currency = '$var3'
            WHERE 
            Item_number = '$Item_number';";
        
        if (mysqli_query($conn, $sql_cmd)) {
            echo "in the query if ";
            echo "$Item_number";
            show_all_product_info($conn,$Item_number);
        } else {
            echo "Error: ";
            echo $sql_cmd . "<br>" . mysqli_error($conn);
        }

        
    } else {
        echo "<br>Please enter all the information.";
    }
}

//update dept 3 info
function edit_dept3($conn, $Item_number) {
    echo "Item_type_code is" . $_POST["Item_type_code"].$_POST["D_line_item_category"].$_POST["Product_code"].$_POST["Country_of_origin"];

    echo "
    <form action='/Task_C/update_dept_info.php' method='post'>
        Enter the information here<br>
        Item_type_code: <input type='text' name='Item_type_code'><br>
        D_line_item_category:<input type='text' name='D_line_item_category'><br> 
        Product_code<input type='text' name='Product_code'><br>
        Country_of_origin<input type='text' name='Country_of_origin'><br>

        <input type='hidden' name='Item_number' value='$Item_number'>
        <input type='submit' value='Submit'>
    </form> 
    ";

    if ($_POST["Item_type_code"] & $_POST["D_line_item_category"] & $_POST["Product_code"] & $_POST["Country_of_origin"]) {
        echo "In the if loop";
        $var1 = $_POST["Item_type_code"];
        $var2 = $_POST["D_line_item_category"];
        $var3 = $_POST["Product_code"];
        $var4 = $_POST["Country_of_origin"];

        echo "$Item_number";
        $sql_cmd = "UPDATE Product 
            SET Item_type_code = '$var1', 
            D_line_item_category = '$var2', 
            Product_code = '$var3', 
            Country_of_origin = '$var4'
            WHERE 
            Item_number = '$Item_number';";
        
        if (mysqli_query($conn, $sql_cmd)) {
            echo "in the query if ";
            echo "$Item_number";
            show_all_product_info($conn,$Item_number);
        } else {
            echo "Error: ";
            echo $sql_cmd . "<br>" . mysqli_error($conn);
        }

        
    } else {
        echo "<br>Please enter all the information.";
    }
}

// update dept 4 info
function edit_dept4($conn, $Item_number) {
    echo "The info you entered " . $_POST["Manufacturing_policy"].$_POST["Routing_No"].$_POST["Reordering_policy"];

    echo "
    <form action='/Task_C/update_dept_info.php' method='post'>
        Enter the information here<br>
        Manufacturing_policy:<input type='text' name='Manufacturing_policy'><br> 
        Routing_No: <input type='text' name='Routing_No'><br>
        Reordering_policy:<input type='text' name='Reordering_policy'><br>
        
        <input type='hidden' name='Item_number' value='$Item_number'>
        <input type='submit' value='Submit'>
    </form> 
    ";

    if ($_POST["Routing_No"] & $_POST["Manufacturing_policy"] & $_POST["Reordering_policy"]) {
        echo "In the if loop";
        $var1 = $_POST["Routing_No"];
        $var2 = $_POST["Manufacturing_policy"];
        $var3 = $_POST["Reordering_policy"];

        echo "$Item_number";
        $sql_cmd = "UPDATE Product 
            SET Routing_No = '$var1', 
            Manufacturing_policy = '$var2', 
            Reordering_policy = '$var3'
            WHERE 
            Item_number = '$Item_number';";
        
        if (mysqli_query($conn, $sql_cmd)) {
            echo "in the query if ";
            echo "$Item_number";
            show_all_product_info($conn,$Item_number);
        } else {
            echo "Error: ";
            echo $sql_cmd . "<br>" . mysqli_error($conn);
        }

        
    } else {
        echo "<br>Please enter all the information.";
    }
}

// TODO function show_taks($conn,)

?>