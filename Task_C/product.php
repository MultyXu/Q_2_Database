<!-- This page shows the search resutl from the index page -->

<?php 
include 'functions.php';
# get the value from html form
$keyword = $_POST["keyword"];
$attribute = $_POST["attribute"];
?>

<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../Task_B/css/w3css.css">
        <title>Product Search Result</title>
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
            <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Search for Our Product</h3>
            <p>Search for the product you want.</p>
            <br>
            <form action="../Task_C/product.php" method="post">
                Search according to attribute:
                <select class="w3-input w3-section w3-border" name="attribute">
                    <option value="Item_number">Item_number</option>
                    <option value="Price">Price</option>
                    <option value="Country_of_origin">Country of Origin</option>
                    Keywords: <input class="w3-input w3-section w3-border" type="text" name="keyword">
                    <input class="w3-button w3-black w3-section" type="submit" value="Submit">
            </form>
        </div>

    <body>

        <div class="w3-container w3-padding-32" id="contact">
            <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Product Search Result</h3>
            <br>
            
            Searching for **<?php echo $keyword; ?>** 
            according to **<?php echo $attribute; ?>**

            <br>

            <?php
            # connect to sql
            $conn = connect_mysql();

            # construct a sql query 
            # query depends on the attribute it gives
            if (!$keyword) {
                $sql_cmd = "SELECT * FROM Product;";
            } else if ($attribute == "Price") {
                $sql_cmd = "SELECT * FROM Product WHERE $attribute = $keyword;";
            } else {
                $sql_cmd = "SELECT * FROM Product WHERE $attribute LIKE '%$keyword%';";
            }

            # $sql_cmd = "SELECT * FROM Product;";
            echo $sql_cmd; # print out the query

            # store the query result in feedback
            $feedback = $conn->query($sql_cmd);

            # print the result on screen
            if(!$feedback){
                echo "Error";
            }

            if ($feedback->num_rows == 0) {
                echo "No result found <br>";
            } else {
                echo " <br> The results are <br>";
                while($row = mysqli_fetch_assoc($feedback)){
                    $item_number = $row["Item_number"];
                    $price = $row["Price"];
                    $quantity = $row["Quantity"];
                
                    # if the value is null, it will print empty
                    echo "<br>Item_number: $item_number, Price: $price, Quantity: $quantity <form action='../Task_C/product_detail.php' method='post'>
                    <input type='hidden' name='Item_number' value='$item_number'>
                    <input class='w3-button w3-black w3-section' type='submit' value='Detail'>
                    </form><br>";
                }
            }

            ?>

        </div>
        
    </body>
</html>

