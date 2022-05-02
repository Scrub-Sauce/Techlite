<?php
include_once 'functions/phpFunctions.php';
include_once '.env.php';
$con = connectDB(DATABASE);
$user = '';
$user_id = -1;
if(isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $user_id = fetchUserID($user, $con);
    if(verifyAdmin($user_id, $con)) { ?>
        <div class = "container">
            <nav class="navbar navbar-expand-sm navbar-dark bg-dark mb-3 rounded">
                <p class="navbar-brand my-auto">Admin Panel</a>
                <div class="container">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="/assets/php/productAdmin.php">Product List</a></li>
                        <li class="nav-item"><a class="nav-link" href="/assets/php/orderListAdmin.php">Order List</a></li>
                        <li class="nav-item"><a class="nav-link" href="/assets/php/userListAdmin.php">User List</a></li>
                        <li class="nav-item"><a class="nav-link" href="/assets/php/discSaleAdmin.php">Add Discounts</a></li>
                    </ul>
                </div>
            </nav>
        </div>
<?php }} ?>
