<?php
include_once "../.env.php";
include_once 'phpFunctions.php';

# Connect to DB
$con = connectDB(PRODUCT_DB);
$sql = "SELECT * FROM product_info";
$query = "";
$user_id = "";
$order_id = "";

# If passed a search variable, save it
if (isset($_GET['query'])) {
    $query = $_GET['query'];
}
if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
}
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
}


/* If query found, select product results by it and print JSON,
otherwise print all products in JSON format */
if (!empty($query)) {
    $query = htmlspecialchars($query);
    $sql = "SELECT * FROM product_info WHERE product_name LIKE '%".$query."%'";
    $results = mysqli_query($con,$sql);
    $data = array();
    foreach ($results as $row){
        $data[] = $row;
    }
    echo json_encode($data);
} else if (!empty($user_id)) {
    $sql = "SELECT * FROM product_info.product_info WHERE id IN (SELECT product_id FROM registrar.cart_info WHERE user_id='$user_id');";
    $results = mysqli_query($con,$sql);
    $data = array();
    foreach ($results as $row){
        $data[] = $row;
    }
    echo json_encode($data);

} else if (!empty($order_id)) {
      $sql = "SELECT * FROM product_info.product_info WHERE id IN (SELECT product_id FROM orders.order_products WHERE order_id ='$order_id');";
      $results = mysqli_query($con,$sql);
      $data = array();
      foreach ($results as $row){
          $data[] = $row;
      }
      echo json_encode($data);
} else {
        $results = mysqli_query($con,$sql);
        $data = array();
        foreach ($results as $row){
            $data[] = $row;
}
echo json_encode($data);
}
?>
