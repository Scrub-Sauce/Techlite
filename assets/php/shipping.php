<!doctype html>
<!-- http://ec2-44-202-10-232.compute-1.amazonaws.com/assets/php/shipping.php -->

<?php
include_once "header.php";
include_once ".env.php";

?>
<html>
	<head>
		<title>Shipping</title>
	</head>
	<body>
		<div>
			<form action="insert.php" method="POST">
				<?php
				$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
				
				if (!$con) {
    				exit("<p class='error'>Connection Error: " . mysqli_connect_error() . "</p>");
				}
				session_start();
				
				$user = $_SESSION['user'];
				//$sql = "SELECT * FROM users WHERE user='$user';";
				$sql = "SELECT * FROM users WHERE user='idiot';";
				$result = mysqli_query($con, $sql);
				$row = mysqli_fetch_assoc($result);

				if($row['firstName'] != NULL ){
				?>
				<br><h2>Default Shipping Address</h2><br>
				<?php	
					$firstName = $row['firstName'];
					$lastName = $row['lastName'];
					$streetAddress = $row['streetAddress'];
					$city = $row['city'];
					$state = $row['state'];
					$zipCode = $row['zipCode'];
					$country = $row['country'];
					$phoneNumber = $row['phoneNumber'];
					echo "$firstName $lastName<br>";
					echo "$streetAddress<br>";
					echo "$city, $state $zipCode<br>";
					echo "$country<br>";
					echo "$phoneNumber <br><br>";
				
				?>
				<input type="checkbox" id="useDefault" name="useDefault" value="useDefault">
				<label for="useDefault"> <br>Use default shipping address</label><br>
				<br><input type="submit" value="Submit">
				<?php
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