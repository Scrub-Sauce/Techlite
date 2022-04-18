<!doctype html>
<!-- http://ec2-44-202-10-232.compute-1.amazonaws.com/assets/php/login/recover.php -->

<?php
include_once "templateFunctions.php";
include '../header.php';
include_once "../.env.php";
?>

<html lang="en" dir="ltr">
	<head>
		<title>Techlite | Password Recovery</title>
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

			if(isset($_REQUEST['email'])) {
    			$pass = $_REQUEST['email'];
    			$pass = mysqli_real_escape_string($con, $email);
    			$query= "SELECT * FROM users WHERE email = '$email'";
				$result   = mysqli_query($con, $query);
    			if ($result) { //then send a recovery email
        			echo "<div class='form'>
						  <h3>An email has been sent!</h3><br/>
                  	      <p class='link'>Click <a href='login.php'>here</a> to login</p>
					  	  </div>";
    			} else {
        			echo "<div class='form'>
                 	  	  <h3>Email submitted is not registered!</h3><br/>
                  	  	  <p class='link'>Click <a href='recover.php'>here</a> to try again.</p>
                  	 	  </div>";
    			}
			} else{
    	?>
    			<div class="container">
					<h1 class="display-4">Password Recovery</h1>
					<div class="form-group">
						<form class="form" action="" method="POST">
							<label for="email">Email</label>
        					<input class="form-control" type="text" name="email" placeholder="Email" required />
							<small class="form-text text-muted">An email will be sent to the specified email (If valid) with a link to reset your password.</small>
							<button class="form-control btn-primary mt-3" type="submit" name="submit">Recover</button>
        					<a class="form-control btn btn-outline-primary mt-3" role="button" href="login.php">Sign in</a>
						</form>
					</div>
				</div>
				
		<?php include '../footer.php';
			}
		?>
	</body>
</html>