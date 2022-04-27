<!doctype html>
<!-- http://ec2-44-202-10-232.compute-1.amazonaws.com/assets/php/login/register.php -->

<?php
include_once "templateFunctions.php";
include '../header.php';
include_once "../.env.php";
?>

<html lang="en" dir="ltr">
	<head>
		<title>Techlite | Registration</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
        crossorigin="anonymous">
	</head>
	<body>
		<?php
			// open the connection
			$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);

			//verify connection
			if (!$con) {
				exit("<p class='error'>Connection Error: " . mysqli_connect_error() . "</p>");
			}
			//
			if (isset($_REQUEST['email'])) {
				// $user = $_REQUEST['user'];
    			// $user = mysqli_real_escape_string($con, $user);
    			$pass = $_REQUEST['pass'];
    			$pass = mysqli_real_escape_string($con, $pass);
    			$email = $_REQUEST['email'];
    			$email = mysqli_real_escape_string($con, $email);
				$query= "INSERT INTO user_info (email, password) VALUES ('$email', '$pass')";
				$result   = mysqli_query($con, $query);
				if ($result) {
					# insert last user_id into contact_info table
					// $user = "SELECT user_id FROM user_info WHERE email = '$email'";
					// // echo $user;
					// $row = mysqli_fetch_assoc($result);
					
					// $result = mysqli_query($con, $user);
					// $query = "INSERT INTO contact_info (user_id) VALUES ($user)";
					$query = "INSERT INTO contact_info (user_id)
					SELECT user_id FROM user_info where email = '$email'";
					$result = mysqli_query($con, $query) or trigger_error("Query Failed! SQL: $search_sql - Error: ".mysqli_error($con), E_USER_ERROR);;
					$query = "INSERT INTO payment_info (user_id)
					SELECT user_id FROM user_info where email = '$email'";
					$result = mysqli_query($con, $query) or trigger_error("Query Failed! SQL: $search_sql - Error: ".mysqli_error($con), E_USER_ERROR);;
					if ($result) {
        			echo "<div class='form'>
       					  <h3>You have successfully been registered! Welcome!</h3><br/>
                  		  <p class='link'>Click <a href='login.php'>here</a> to login</p>
                  		  </div>";
					}
					
    			} else {
					echo "<div class='form'>
                  		  <h3>Please enter information into all of the required fields.</h3><br/>
                  		  <p class='link'>Click <a href='register.php'>here</a> to try again.</p>
                  		  </div>";
    			}
			} else {
    	?>
				<div class="container">
					<h1 class="display-4">Create Account</h1>
    				<div class="form-group">
						<form class="form" action="" method="POST" name="register">
						<label for="email">Email</label>
						<input class="form-control" id="email" type="text" name="email" placeholder="Email" required/>
						<label for="password">Password</label>
						<input class="form-control" id="pass" type="password" name="pass" placeholder="Password" required/>
						<button class="form-control btn-primary mt-3" type="submit">Register</button>
							<a href="login.php" class="form-control btn btn-outline-primary mt-3" role="button">Sign in</a>
						</form>
					</div>
				</div>
<!--
				<form class="form" action="" method="post">
        			<input type="text" name="user" placeholder="Username" required />
        			<input type="password" name="pass" placeholder="Password" >
        			<input type="text" name="email" placeholder="Email">
        			<input type="submit" name="submit" value="Register">
        			<p class="link"><a href="login.php">Click here to login</a></p>
    			</form>
-->
    			<?php include '../footer.php';
			}
				?>
	</body>
</html>