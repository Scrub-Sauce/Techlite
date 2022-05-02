<?php
include_once "../.env.php";
include_once 'phpFunctions.php';
$sort_by = "";
if (isset($_GET['sort_by'])) {
    $sort_by = $_GET['sort_by'];
}
# Connect to DB
$con = connectDB(DATABASE);
if (!empty($sort_by)) {
    $sql = "SELECT * FROM orders.order_info AS o JOIN contact_info AS c ON o.user_id = c.user_id ORDER BY $sort_by DESC";
    $results = mysqli_query($con,$sql);
    $data = array();
    foreach ($results as $row){
        $data[] = $row;
    }
    echo json_encode($data);
} else {
    $sql = "SELECT * FROM orders.order_info AS o JOIN contact_info AS c ON o.user_id = c.user_id";
    $results = mysqli_query($con,$sql);
    $data = array();
    foreach ($results as $row){
        $data[] = $row;
    }
    echo json_encode($data);
}
?>
