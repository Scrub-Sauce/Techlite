<?php
include_once "../.env.php";
include_once 'phpFunctions.php';

# Connect to DB
$con = connectDB(PRODUCT_DB);

if(isset($_POST['admin'])) {
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $admin_sql = "INSERT INTO registrar.admins (user_id) VALUES ($user_id)";
    $results = mysqli_query($con,$admin_sql) or trigger_error("Query Failed! SQL: $search_sql - Error: ".mysqli_error($con), E_USER_ERROR);
    echo "Successfully added user admin: <br />NAME: $name<br />ID: $user_id";
}

?>