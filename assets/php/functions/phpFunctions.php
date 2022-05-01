<?php
# Connects to SQL database and begins a session
function connectDB($db) {
    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, $db);

    # verify connection
    if (!$con) {
        exit("<p class='error'>Connection Error: " . mysqli_connect_error() . "</p>");
    }
    return $con;
}

# Fetches individual product data given a product ID as action
function getProductData($action, $con) {
    $sql_product = "SELECT * FROM product_info WHERE product_info.id = {$action}";
    $result = mysqli_query($con,$sql_product) or die(mysqli_error($con));
    $data = array();
    foreach ($result as $row){
        $data[] = $row;
    }
    return $data;
}

function fetchUserID($email, $con) {
    $sql_id = "SELECT * FROM registrar.user_info WHERE email = '$email'";
    $result = mysqli_query($con,$sql_id) or die(mysqli_error($con));
    $data = array();
    foreach ($result as $row){
        $data[] = $row;
    }
    return $data[0]["user_id"];
}

function verifyAdmin($user_id, $con) {
    $sql_admin = "SELECT * FROM registrar.admins WHERE user_id = $user_id";
    $result = mysqli_query($con,$sql_admin) or die(mysqli_error($con));
    $rows = mysqli_num_rows($result);                       //if there is a match, $rows should contain 1 row
    if ($rows == 1) {
        return True;
    }
}

# Fetches user's cart data given a user ID as action
function pushUserCartData($prod, $user, $con) {
    $sql_cart = "INSERT INTO registrar.cart_info (user_id, product_id, product_qty) VALUES ('$user', '$prod', 1)";
    $result = mysqli_query($con,$sql_cart) or trigger_error("Query Failed! SQL: $search_sql - Error: ".mysqli_error($con), E_USER_ERROR);
    return;
}



function pushUserOrderData($con, $user) {
    $date = date('Y-m-d H:i:s');
    $status = "Pending";
    $sql_order = "INSERT INTO orders.order_info (user_id, order_date, order_status) VALUES ('$user', '$date', '$status')";
    $result1 = mysqli_query($con,$sql_order) or die(mysqli_error($con));
    $sql_id = "SELECT * FROM orders.order_info WHERE order_id = LAST_INSERT_ID()";
    $result2 = mysqli_query($con,$sql_id) or die(mysqli_error($con));
    $row = mysqli_fetch_row($result2);
    $order_id = $row[0];
    $sql_order_products = "INSERT INTO orders.order_products (order_id, product_id, quantity, price, discount)
                            SELECT $order_id, product_id, product_qty, '10', '10'
                            FROM registrar.cart_info WHERE registrar.cart_info.user_id = $user";
    $result3 = mysqli_query($con,$sql_order_products) or trigger_error("Query Failed! SQL: $search_sql - Error: ".mysqli_error($con), E_USER_ERROR);
    $sql_delete_cart = "DELETE FROM registrar.cart_info WHERE user_id = '$user'";
    $result4 = mysqli_query($con,$sql_delete_cart) or die(mysqli_error($con));
    return $order_id;
}
?>
