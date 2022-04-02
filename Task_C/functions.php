<?php
function connect_mysql(){
    # connect to sql, need to change the servername & username if necessary
    $servername = "localhost";
    $username = "root";
    $password = ""; # no password

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

function show_all_product($conn,$Item_number) {
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
?>