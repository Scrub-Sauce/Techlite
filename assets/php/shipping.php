<!doctype html>
<!-- http://ec2-44-202-10-232.compute-1.amazonaws.com/assets/php/shipping.php -->

<?php
include_once "header.php";
?>
<html>
	<head>
		<title>Shipping</title>
	</head>
	<body>
		<div>
			<form action="insert.php" method="POST">
				<?php
				if($_SESSION['firstName'] != NULL ){
					echo "Default Shipping Address \n";	
					$firstName = $_SESSION['firstName'];
					$lastName = $_SESSION['lastName'];
					$streetAddress = $_SESSION['streetAddress'];
					$city = $_SESSION['city'];
					$state = $_SESSION['state'];
					$zipCode = $_SESSION['zipCode'];
					$country = $_SESSION['country'];
					$phoneNumber = $_SESSION['phoneNumber'];
					echo "$firstName $astName";
					echo "$streetAddress";
					echo "$city, $state $zipcode";
					echo "$country";
					echo "$phoneNumber";
				}
				?>
				<div>
					<br><h2>Shipping Address</h2><br>
					<lable for="fname">First Name:</lable><br>
					<input type="text" id="fname" name="fname" required><br>
					<lable for="lname">Last Name:</lable><br>
					<input type="text" id="lname" name="lname" required><br>
					<lable for="address">Street Address:</lable><br>
					<input type="text" id="address" name="address" required><br>
					<lable for="city">City:</lable><br>
					<input type="text" id="city" name="city" required><br>
					<lable for="state">State:</lable><br>
					<input type="text" id="state" name="state" required><br>
					<lable for="zcode">Zipcode:</lable><br>	
					<input type="text" id="zcode" name="zcode" required><br>
					<lable for="country">Country:</lable><br>
					<input type="text" id="country" name="country" required><br>
					<lable for="phone">Phone Number:</lable><br>
					<input type="text" id="phone" name="phone" required><br><br>
				</div>
				<div>
					<br><h2>Payment Information</h2><br>
					<lable for="paymentfname">First Name:</lable><br>
					<input type="text" id="paymentfname" name="paymentfname"><br>
					<lable for="paymentmname">Middle Name:</lable><br>
					<input type="text" id="paymentmname" name="paymentmname"><br>
					<lable for="paymentlname">Last Name:</lable><br>
					<input type="text" id="paymentlname" name="paymentlname"><br>
					<lable for="cardnumber">Card Number:</lable><br>
					<input type="text" id="cardnumber" name="cardnumber"><br>
					<lable for="cardexp">Expiration Date:</lable><br>
					<input type="text" id="cardexp" name="cardexp"><br>
					<lable for="cardsecurity">Security Code:</lable><br>
					<input type="text" id="cardsecurity" name="cardsecurity"><br>
				</div>
				<div>
					<br><h2>Billing Address</h2><br>
					<lable for="billaddress">Street Address:</lable><br>
					<input type="text" id="billaddress" name="billaddress"><br>
					<lable for="billcity">City:</lable><br>
					<input type="text" id="billcity" name="billcity"><br>
					<lable for="billstate">State:</lable><br>
					<input type="text" id="billstate" name="billstate"><br>
					<lable for="billzcode">Zipcode:</lable><br>	
					<input type="text" id="billzcode" name="billzcode"><br>
				</div>
				<br><input type="submit" value="Submit">
			</form>
		</div>
	</body>
</html>
<?php
include_once "footer.php";
?>