<!doctype html>
<!-- http://ec2-44-202-10-232.compute-1.amazonaws.com/assets/php/login/recover.php -->

<?php
include_once "templateFunctions.php";
include '../header.php';
include_once "../.env.php";
?>

<html style="margin: auto; max-width: 1000px;">
<link rel="stylesheet" type="text/css" href="main.css">
<head>
    <h1 align="center">Password Recovery</h1>
    <hr>
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
} 
else{
    ?>
    <form class="form" action="" method="post">
        <input type="text" name="email" placeholder="Email" required />
        <input type="submit" name="submit" value="Recover">
        <p class="link"><a href="login.php">Login</a></p>
        <p class="link"><a href="register.php">Register</a></p> 
</form>


<p>An email will be sent to the specified email (If valid) with a link to reset your password.</p>


}

<?php include '../footer.php';
}
?>
</body>
</html>