<!doctype html>
<!-- http://ec2-44-202-10-232.compute-1.amazonaws.com/assets/php/login/login.php -->

<?php
include_once "templateFunctions.php";
include '../header.php';
include_once "../.env.php";
?>

<html lang="en" dir="ltr">
	<head>
		<title>Techlite | Sign In</title>
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
			session_start();
			// When form submitted, check and create user session.
			if (isset($_POST['user'])) {
    			$user = $_REQUEST['user'];
    			$user = mysqli_real_escape_string($con, $user);
    			$pass = $_REQUEST['pass'];
    			$pass = mysqli_real_escape_string($con, $pass);
    			//$password_hash = hash("md5", $_POST['pass']);         //I was gonna protect with hash's but then i got the assignment to work so i dont want to mess with it!
    			$query= "SELECT * FROM users WHERE user='$user' AND pass='$pass'";                     //if user AND password exist in the users table
    			$result = mysqli_query($con, $query);                   //store the result of that query in result
    			$rows = mysqli_num_rows($result);                       //if there is a match, $rows should contain 1 row
    			if ($rows == 1) {
					$_SESSION['user'] = $user;                          //attach the session to the current user and log back into index with the user session
					// Redirect to user dashboard page
        			header("Location: index.php");
				} else {
					echo "<div class='form'>                                                          
                		<h3>Incorrect Username/password.</h3><br/>
                		<p class='link'>Click <a href='login.php'>here</a> to try again.</p>
                		</div>";
    			}                                                       //match was not found
			} else {
    	?>
		<div class="container">
			<h1 class="display-4">Sign in</h1>
			<div class="form-group">
				<form class="form" method="POST" name="login">
					<label for="user">Email Address</label>
					<input class="form-control form-control-md" id="user" type="text" name="user" placeholder="Email" autofocus="true"/>
					<small class="form-text text-muted">Example: johndoe@gmail.com</small>
					<label for="pass">Password</label>
					<input class="form-control" id="pass" type="password" name="pass" placeholder="Password"/>
					<button class="form-control btn-primary mt-3" type="submit" value="Login" name="submit">Sign in</button>
					<a href="recover.php" class="form-control btn btn-outline-primary mt-1" role="button">Forgot Password?</a>
					<a href="register.php" class="form-control btn btn-success mt-3" role="button">Create Account</a>
				</form>
			</div>
		</div>
    	<?php include '../footer.php';}?>
	</body>
</html>