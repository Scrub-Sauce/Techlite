<?php
include_once "../.env.php";
include_once 'phpFunctions.php';

# Connect to DB
$con = connectDB(PRODUCT_DB);
$sql = "SELECT * FROM product_info";
$query = "";

# If passed a search variable, save it
if (isset($_GET['query'])) {
    $query = $_GET['query'];
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
} else {
    $results = mysqli_query($con,$sql);
    $data = array();
    foreach ($results as $row){
        $data[] = $row;
    }
    echo json_encode($data);
}
?>
