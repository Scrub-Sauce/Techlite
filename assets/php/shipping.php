<!doctype html>
<!-- http://ec2-44-202-10-232.compute-1.amazonaws.com/assets/php/shipping.php -->

<?php
include_once "header.php";
include_once ".env.php";
?>
<html lang="en" dir="ltr">
	<head>
		<title>Techlite | Shipping</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
        crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
				<?php
				$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
				
				if (!$con) {
    				exit("<p class='error'>Connection Error: " . mysqli_connect_error() . "</p>");
				}
				session_start();
				
				$user = $_SESSION['user'];
				//$sql = "SELECT * FROM users WHERE user='$user';";
				$sql = "SELECT * FROM contact_info WHERE user_id='30';";
				$result = mysqli_query($con, $sql);
				$row = mysqli_fetch_assoc($result);

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
				
				?>
			<form action="useDefault.php" method="POST">
				<div class="form-group float-left">
					<button class="form-control btn-success" type="submit">Use default shipping address</button>
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
					<lable for="paymentfname">First Name:</lable>
					<input class="form-control" type="text" id="paymentfname" name="paymentfname">
					<lable for="paymentmname">Middle Name:</lable>
					<input class="form-control" type="text" id="paymentmname" name="paymentmname">
					<lable for="paymentlname">Last Name:</lable>
					<input class="form-control" type="text" id="paymentlname" name="paymentlname">
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
	</body>
</html>
<?php include_once "footer.php";?>