<?php

function connectDB($table) {
    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, $table);

    //verify connection
    if (!$con) {
        exit("<p class='error'>Connection Error: " . mysqli_connect_error() . "</p>");
    }
    session_start();
    return $con;
}
function getProductData($action, $con) {
    $sql_product = "SELECT * FROM product_info WHERE product_info.id = {$action}";
    $result = mysqli_query($con,$sql_product) or die(mysqli_error($connect));
    $data = array();
    foreach ($result as $row){
        $data[] = $row;
    }
    return $data;
}
?>
