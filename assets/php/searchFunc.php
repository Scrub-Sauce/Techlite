<?php
include_once "templateFunctions.php";
include_once ".env.php";
// ob_start();
// require_once "search.php";
// ob_end_clean();
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, PRODUCT_DB);
if (!$con) {
    exit("<p class='error'>Connection Error: " . mysqli_connect_error() . "</p>");
}
session_start();
$query = $_GET['query'];
// $query = fetchSearchQuery();
$query = htmlspecialchars($query);
$search_sql = "SELECT * FROM product_info WHERE product_name LIKE '%".$query."%'";
$results = mysqli_query($con,$search_sql);
$data = array();
foreach ($results as $row){
    $data[] = $row;
}
echo json_encode($data);
?>
