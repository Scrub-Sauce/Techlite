<?php
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zcode = $_POST['zcode'];
$country = $_POST['country'];
$phone = $_POST['phone'];


if_(!empty($fname) || !empty($lname) || !empty($address) || !empty($city) || !empty($state) || !empty($zcode) || !empty($country) || !empty($phone)) {
	$host = "";
}else {
	echo "All Fields Are Required";
	die();
}
?>
