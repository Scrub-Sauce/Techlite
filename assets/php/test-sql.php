<!doctype html>
<!-- http://ec2-44-202-10-232.compute-1.amazonaws.com/assets/php/test-sql.php -->

<?php
$servername = "localhost";
$username = "root";
$password = "X(aC34Xp9v=W]Kt9";
$dbname = "product_info";

$connect = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

$test_table_sql = "SELECT * FROM product_info";
$result = mysqli_query($connect,$test_table_sql);
$data = array();
foreach ($result as $row){
    $data[] = $row;
}

echo json_encode($data);
?>
