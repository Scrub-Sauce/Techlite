<!doctype html>
<!-- http://ec2-44-202-10-232.compute-1.amazonaws.com/assets/php/shipping.php -->

<?php
include 'header.php';
include_once 'functions/phpFunctions.php';
include_once '.env.php';
include_once 'authentication.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
		<div class="container">
				<?php
				$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);

				if (!$con) {
    				exit("<p class='error'>Connection Error: " . mysqli_connect_error() . "</p>");
				}

				$user = $_SESSION['user'];
                $user_id = fetchUserID($user, $con);
				// $user = 32;
				// $_SESSION['user'] = $user;
				//$sql = "SELECT * FROM contact_info WHERE user_id='$user';";
				$sql = "SELECT * FROM contact_info WHERE user_id=$user_id";
				$result = mysqli_query($con, $sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($con), E_USER_ERROR);
				$row = mysqli_fetch_assoc($result);

				$sql = "SELECT * FROM payment_info WHERE user_id=$user_id";
				$result = mysqli_query($con, $sql)  or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($con), E_USER_ERROR);
				$row2 = mysqli_fetch_assoc($result);

				if($row['first_name'] != NULL ){
				?>
				<br><h2>Default Shipping Address</h2><br>
				<?php
					$firstName = $row['first_name'];
					$lastName = $row['last_name'];
					$streetAddress = $row['street_address'];
					$city = $row['city'];
					$state = $row['state'];
					$zipCode = $row['zip'];
					$phoneNumber = $row['phone_number'];
					echo "$firstName $lastName<br>";
					echo "$streetAddress<br>";
					echo "$city, $state $zipCode<br>";
					echo "$phoneNumber <br><br>";
				if($row2['name_on_card']!= NULL){

				?>
				<br><h2>Default Payment Method</h2><br>
				<?php
					$cardName = $row2['name_on_card'];
					$cardNum = $row2['card_number'];
					$cardExp = $row2['expiration'];
					$cardSecurity = $row2['security_code'];
					$billAddress = $row2['billing_address'];
					$billState = $row2['billing_state'];
					$billCity = $row2['billing_city'];
					$billZip = $row2['billing_zip'];
					echo "$cardName<br>";
					echo "$cardNum<br>";
					echo "$cardExp    $cardSecurity<br>";
					echo "$billAddress<br>";
					echo "$billCity, $billState $billZip<br><br>";
				}

				?>
			<form action="useDefault.php" method="POST">
				<div class="form-group float-left">
					<button class="form-control btn-success" type="submit">Use Default Address and Payment</button>
				</div>
			</form>
				<?php
				} ?>
			<form action="insert.php" method="POST">
				<div class="clearfix"></div>
				<div class="form-group float-left">
					<br><h2 class="display-5">Shipping Address</h2>
					<lable for="fname">First Name:</lable>
					<input class="form-control" type="text" id="fname" name="fname" required>
					<lable for="lname">Last Name:</lable>
					<input class="form-control" type="text" id="lname" name="lname" required>
					<lable for="address">Street Address:</lable>
					<input class="form-control" type="text" id="address" name="address" required>
					<lable for="city">City:</lable>
					<input class="form-control" type="text" id="city" name="city" required>
					<lable for="state">State:</lable>
					<input class="form-control" type="text" id="state" name="state" required>
					<lable for="zcode">Zipcode:</lable>
					<input class="form-control" type="text" id="zcode" name="zcode" required>
					<lable for="phone">Phone Number:</lable>
					<input class="form-control" type="text" id="phone" name="phone" required><br>
					<input type="checkbox" id="useDefaultShipping" name="useDefaultShipping" value="true">
					<label for="useDefaultShipping"> Set as Default Shipping Address</label><br>
				</div>
				<div class="clearfix"></div>
				<div class="form-group float-left">
					<br><h2 class="display-5">Payment Information</h2>
					<lable for="paymentname">Name on Card:</lable>
					<input class="form-control" type="text" id="paymentname" name="paymentname">
					<lable for="cardnumber">Card Number:</lable>
					<input class="form-control" type="text" id="cardnumber" name="cardnumber">
					<lable for="cardexp">Expiration Date:</lable>
					<input class="form-control" type="text" id="cardexp" name="cardexp">
					<lable for="cardsecurity">Security Code:</lable>
					<input class="form-control" type="text" id="cardsecurity" name="cardsecurity">
					<lable for="billaddress">Street Address:</lable>
					<input class="form-control" type="text" id="billaddress" name="billaddress">
					<lable for="billcity">City:</lable>
					<input class="form-control" type="text" id="billcity" name="billcity">
					<lable for="billstate">State:</lable>
					<input class="form-control" type="text" id="billstate" name="billstate">
					<lable for="billzcode">Zipcode:</lable>
					<input class="form-control" type="text" id="billzcode" name="billzcode"><br>
					<input type="checkbox" id="useDefaultBilling" name="useDefaultBilling" value="true">
					<label for="useDefaultBilling"> Set as Default Payment Method</label><br>
				</div>
				<div class="clearfix"></div>
				<button class="form-control btn-success" type="submit">Submit</button>
			</form>
		</div>

<?php include_once 'footer.php';?>
