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
?>