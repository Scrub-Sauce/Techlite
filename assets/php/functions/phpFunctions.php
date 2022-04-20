<?php

# Connects to SQL database and begins a session
function connectDB($db) {
    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, $db);

    # verify connection
    if (!$con) {
        exit("<p class='error'>Connection Error: " . mysqli_connect_error() . "</p>");
    }

    session_start();
    return $con;
}

# Fetches individual product data given a product ID as action
function getProductData($action, $con) {
    $sql_product = "SELECT * FROM product_info WHERE product_info.id = {$action}";
    $result = mysqli_query($con,$sql_product) or die(mysqli_error($connect));
    $data = array();
    foreach ($result as $row){
        $data[] = $row;
    }
    return $data;
}

# Fetches user's cart data given a user ID as action 
function getUserCartData($action, $con) {

}
?>
