<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include_once ".env.php";
include_once 'phpFunctions.php';
$con = connectDB(PRODUCT_DB);
$sql = "SELECT * FROM product_info";
$query = "";
if (isset($_GET['query'])) {
    $query = $_GET['query'];
}
if (!empty($query)) {
    $query = htmlspecialchars($query);
    $sql = "SELECT * FROM product_info WHERE product_name LIKE '%".$query."%'";
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
