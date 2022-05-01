<?php
include_once "../.env.php";
include_once 'phpFunctions.php';

# Connect to DB
$con = connectDB(DATABASE);
$sql = "SELECT * FROM orders.order_info AS o JOIN contact_info AS c ON o.user_id = c.user_id";
$results = mysqli_query($con,$sql);
$data = array();
foreach ($results as $row){
    $data[] = $row;
}
echo json_encode($data);
?>
