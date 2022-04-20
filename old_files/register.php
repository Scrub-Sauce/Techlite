<?php
include_once "templateFunctions.php";
include_once ".env.php";
?>

<html style="margin: auto; max-width: 1000px;">
<link rel="stylesheet" type="text/css" href="main.css">
<head>
    <h1 align="center">Register</h1>
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
//
if (isset($_REQUEST['user'])) {
    $user = $_REQUEST['user'];
    $user = mysqli_real_escape_string($con, $user);
    $pass = $_REQUEST['pass'];
    $pass = mysqli_real_escape_string($con, $pass);
    $query= "INSERT INTO users (user, pass)
                     VALUES ('$user', '$pass')";
    $result   = mysqli_query($con, $query);
    if ($result) {
        echo "<div class='form'>
                  <h3>You have successfully been registered! Welcome!</h3><br/>
                  <p class='link'>Click <a href='login.php'>here</a> to login</p>
                  </div>";
    } else {
        echo "<div class='form'>
                  <h3>Please enter information into all of the required fields.</h3><br/>
                  <p class='link'>Click <a href='register.php'>here</a> to try again.</p>
                  </div>";
    }
} else {
    ?>
    <form class="form" action="" method="post">
        <input type="text" name="user" placeholder="Username" required />
        <input type="password" name="pass" placeholder="Password">
        <input type="submit" name="submit" value="Register">
        <p class="link"><a href="login.php">Click here to login</a></p>
    </form>
    <?php
}
?>
</body>
</html>