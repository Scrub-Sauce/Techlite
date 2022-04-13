<!doctype html>
<!-- http://ec2-44-202-10-232.compute-1.amazonaws.com/assets/php/searchFunc.php -->

<?php
include_once "templateFunctions.php";
include_once ".env.php";
require_once "search.php";
?>

<?php
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, PRODUCT_DB);

//verify connection
if (!$con) {
    exit("<p class='error'>Connection Error: " . mysqli_connect_error() . "</p>");
}
session_start();

$query = fetchSearchQuery();
$query = htmlspecialchars($query);
$search_sql = "SELECT * FROM product_info WHERE product_name LIKE '%".$query."%'";
$results = mysqli_query($con,$search_sql);
$data = array();
foreach ($results as $row){
    $data[] = $row;
}
echo json_encode($data);
?>
