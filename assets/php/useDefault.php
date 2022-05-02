<!doctype html>
<!-- http://ec2-44-202-10-232.compute-1.amazonaws.com/assets/php/useDefault.php -->

<html>
	<head>
		<meta charset="utf-8">
		<title>Untitled Document</title>
	</head>

	<body>
		<?php
		include 'header.php';
		include_once 'functions/phpFunctions.php';
		include_once '.env.php';
		include_once 'authentication.php';
		error_reporting(E_ALL);
		ini_set('display_errors', 1);
		$order_confirmation = False;
		if (isset($_GET["order_confirmation"])) {
    		$order_confirmation = True;
		}
		$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);

		if (!$con) {
    		exit("<p class='error'>Connection Error: " . mysqli_connect_error() . "</p>");
		}			

		$user = $_SESSION['user'];
        $user_id = fetchUserID($user, $con);
		$sql = "SELECT * FROM contact_info WHERE user_id=$user_id";
		$result = mysqli_query($con, $sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($con), E_USER_ERROR);
		$row = mysqli_fetch_assoc($result);

		$sql = "SELECT * FROM payment_info WHERE user_id=$user_id";
		$result = mysqli_query($con, $sql)  or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($con), E_USER_ERROR);
		$row2 = mysqli_fetch_assoc($result);

		$firstName = $row['first_name'];
		$lastName = $row['last_name'];
		$streetAddress = $row['street_address'];
		$city = $row['city'];
		$state = $row['state'];
		$zipCode = $row['zip'];
		$phoneNumber = $row['phone_number'];
		
		$cardName = $row2['name_on_card'];
		$cardNum = $row2['card_number'];
		$cardExp = $row2['expiration'];
		$cardSecurity = $row2['security_code'];
		$billAddress = $row2['billing_address'];
		$billState = $row2['billing_state'];
		$billCity = $row2['billing_city'];
		$billZip = $row2['billing_zip'];
		
		$_SESSION['fname'] = $firstName;
		$_SESSION['lname'] = $lastName;
		$_SESSION['address'] = $streetAddress;
		$_SESSION['city'] = $city;
		$_SESSION['state'] = $state;
		$_SESSION['zcode'] = $zipCode;
		$_SESSION['phone'] = $phoneNumber;

		$_SESSION['cardName'] = $cardName;
		$_SESSION['cardNum'] = $cardNum;
		$_SESSION['cardExp'] = $cardExp;
		$_SESSION['cardSecurity'] = $cardSecurity;
		$_SESSION['billAddress'] = $billAddress;
		$_SESSION['billCity'] = $billCity;
		$_SESSION['billState'] = $billState;
		$_SESSION['billZip'] = $billZip;
		
		header("Location: http://ec2-44-202-10-232.compute-1.amazonaws.com/assets/php/placeOrder.php?order_confirmation= $order_confirmation ");
		exit();
		?>
	</body>
</html>
