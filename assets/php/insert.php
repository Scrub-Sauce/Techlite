<!doctype html>
<!-- http://ec2-44-202-10-232.compute-1.amazonaws.com/assets/php/insert.php -->

<?php

include 'header.php';
include_once 'functions/phpFunctions.php';
include_once '.env.php';
include_once 'authentication.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);

if (!$con) {
    exit("<p class='error'>Connection Error: " . mysqli_connect_error() . "</p>");
}

$user = $_SESSION['user'];
$user_id = fetchUserID($user, $con);

if (!isset($_POST['useDefaultShipping']) || !isset($_POST['useDefaultBilling'])) {
    header("Location: placeOrder.php?order_confirmation=Success");
    exit();
}

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zcode = $_POST['zcode'];
$phone = $_POST['phone'];
$defaultShipping = $_POST['useDefaultShipping'];

$cardName = $_POST['paymentname'];
$cardNum = $_POST['cardnumber'];
$cardExp = $_POST['cardexp'];
$cardSecurity = $_POST['cardsecurity'];
$billAddress = $_POST['billaddress'];
$billCity = $_POST['billcity'];
$billState = $_POST['billstate'];
$billZip = $_POST['billzcode'];
$defaultBilling = $_POST['useDefaultBilling'];

$order_confirmation = False;
if (isset($_GET['order_confirmation'])) {
    $order_confirmation = $_GET['order_confirmation'];
}

$contact_check = !empty($fname) && !empty($lname) && !empty($city) && !empty($state) && !empty($zcode) && !empty($phone)  && !empty($defaultShipping);
$payment_check = !empty($cardName) && !empty($cardNum) && !empty($cardExp) && !empty($cardSecurity) && !empty($billAddress) && !empty($billCity) && !empty($billState) && !empty($billZip) && !empty($defaultBilling);

if ($contact_check && $payment_check) {
	if ($defaultShipping == TRUE){
		$sql = "UPDATE contact_info
				SET first_name = '$fname', last_name = '$lname', phone_number = '$phone', street_address = '$address', city = '$city', state = '$state', zip = '$zcode'
				WHERE user_id = '$user_id'";
		mysqli_query($con, $sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($con), E_USER_ERROR);
	}
	if ($defaultBilling == TRUE){
		$sql = "UPDATE payment_info
				SET name_on_card = '$cardName', card_number = '$cardNum', expiration = '$cardExp', security_code = '$cardSecurity', billing_address = '$billAddress', billing_state = '$billState', billing_city = '$billCity', billing_zip = '$billZip'
				WHERE user_id = '$user_id'";
		mysqli_query($con, $sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($con), E_USER_ERROR);
	}
if ($order_confirmation) {
		$_SESSION['fname'] = $fname;
		$_SESSION['lname'] = $lname;
		$_SESSION['address'] = $address;
		$_SESSION['city'] = $city;
		$_SESSION['state'] = $state;
		$_SESSION['zcode'] = $zcode;
		$_SESSION['phone'] = $phone;
	
		$_SESSION['cardName'] = $cardName;
		$_SESSION['cardNum'] = $cardNum;
		$_SESSION['cardExp'] = $cardExp;
		$_SESSION['cardSecurity'] = $cardSecurity;
		$_SESSION['billAddress'] = $billAddress;
		$_SESSION['billCity'] = $billCity;
		$_SESSION['billState'] = $billState;
		$_SESSION['billZip'] = $billZip;
	
    header("Location: placeOrder.php?order_confirmation=Success");
    exit();
} else {
    header("Location: shipping.php");
    exit();
}

}else {
	echo "All Fields Are Required";
	die();
}

include_once "footer.php";
?>
