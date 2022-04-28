<?php
include_once "../.env.php";
include_once 'phpFunctions.php';

# Connect to DB
$con = connectDB(DATABASE);
$sql = "SELECT * FROM contact_info AS c JOIN user_info AS u ON c.user_id = u.user_id";
$results = mysqli_query($con,$sql);
$data = array();
foreach ($results as $row){
    $data[] = $row;
}
echo json_encode($data);
?>
