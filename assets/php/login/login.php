<!doctype html>
<!-- http://ec2-44-202-10-232.compute-1.amazonaws.com/assets/php/login/login.php -->

<?php
include_once "templateFunctions.php";
include '../header.php';
include_once "../.env.php";
?>

<html style="margin: auto; max-width: 1000px;">
<head>
    <h1 align="center">Login</h1>
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
session_start();
// When form submitted, check and create user session.
if (isset($_POST['user'])) {
    $user = $_REQUEST['user'];
    $user = mysqli_real_escape_string($con, $user);
    $pass = $_REQUEST['pass'];
    $pass = mysqli_real_escape_string($con, $pass);
    //$password_hash = hash("md5", $_POST['pass']);         //I was gonna protect with hash's but then i got the assignment to work so i dont want to mess with it!
    $query= "SELECT * FROM users WHERE user='$user'         
                     AND pass='$pass'";                     //if user AND password exist in the users table
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
    <form class="form" method="POST" name="login">
        <input type="text" name="user" placeholder="Username" autofocus="true"/>
        <input type="password" name="pass" placeholder="Password"/>
        <input type="Submit" value="Login" name="submit"/>
        <p class="link"><a href="register.php">New Registration</a></p>
    </form>
    <?php include '../footer.php';
}
?>
</body>
</html>