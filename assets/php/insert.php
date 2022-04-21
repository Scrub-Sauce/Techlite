<!doctype html>
<!-- http://ec2-44-202-10-232.compute-1.amazonaws.com/assets/php/insert.php -->

<?php

include_once "header.php";
include_once ".env.php";

$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
				
if (!$con) {
    exit("<p class='error'>Connection Error: " . mysqli_connect_error() . "</p>");
}
session_start();


$fname = $_POST['fname'];
$lname = $_POST['lname'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zcode = $_POST['zcode'];
$phone = $_POST['phone'];
$defaultShipping = $_POST['useDefaultShipping'];


if (!empty($fname) || !empty($lname) || !empty($address) || !empty($city) || !empty($state) || !empty($zcode) || !empty($phone)) {
	echo "$fname <br>";
	echo "$lname <br>";
	echo "$address <br>";
	echo "$city <br>";
	echo "$state <br>";
	echo "$zcode <br>";
	echo "$phone <br>";
	if ($defaultShipping == TRUE){
		echo "test";
		$sql = "UPDATE contact_info
				SET first_name = '$fname', last_name = '$lname', phone_number = '$phone', street_address = '$address', city = '$city', state = '$state', zip = '$zcode'
				WHERE user_id = '30';";
		mysqli_query($con, $sql) or trigger_error("Query Failed! SQL: $search_sql - Error: ".mysqli_error($con), E_USER_ERROR);
	}
}else {
	echo "All Fields Are Required";
	die();
}

include_once "footer.php";
?>
