<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../Task_B/css/w3css.css">
        <title>Search for Prodcut</title>
    </head>

    <!-- Navigation Bar -->
    <div class="w3-top">
        <div class="w3-bar w3-white w3-wide w3-padding w3-card">
          <a href="../Task_B/index.html" class="w3-bar-item w3-button"><b>Q2</b> PRODUCT</a>
          <!-- Float links to the right. Hide them on small screens -->
          <div class="w3-right w3-hide-small">
            <a href="../Task_B/update_product.php" class="w3-bar-item w3-button">Product</a>
            <a href="TODO" class="w3-bar-item w3-button">Task</a>
            <a href="TODO" class="w3-bar-item w3-button">Admin</a>
            <a href="TODO" class="w3-bar-item w3-button">Login</a>
          </div>
        </div>
    </div>

    <body>

        <div class="w3-container w3-padding-32" id="contact">
            <!-- php code for showing all product info -->
            <?php
            include 'functions.php';
            $conn = connect_mysql();
            $Item_number = $_POST["Item_number"];
            show_all_product($conn, $Item_number);
            ?>
        </div>
        

    </body>
</html>