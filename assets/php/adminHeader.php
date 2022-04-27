<?php
include_once 'functions/phpFunctions.php';
include_once '.env.php';
$con = connectDB(DATABASE);
error_reporting(E_ALL);
ini_set('display_errors', '1');
$user = $_SESSION['user'];
$user_id = -1;
if(isset($user)) {
    $user_id = fetchUserID($user, $con);
    if(verifyAdmin($user_id, $con)) { ?>
        <div class = "container">
            <nav class="navbar navbar-expand-sm navbar-dark bg-dark mb-3 rounded">
                <div class="container justify-content-center">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="/assets/php/productAdmin.php">Product List</a></li>
                        <li class="nav-item"><a class="nav-link" href="/assets/php/orderListAdmin.php">Order List</a></li>
                        <li class="nav-item"><a class="nav-link" href="/assets/php/userListAdmin.php">User List</a></li>
                    </ul>
                </div>
            </nav>
        </div>
<?php }} ?>
