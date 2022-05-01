<!doctype html>
<!-- http://ec2-44-202-10-232.compute-1.amazonaws.com/assets/php/search.php -->

<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include 'header.php';
include_once 'functions/phpFunctions.php';
include_once '.env.php';
include_once 'authentication.php';

$con = connectDB(PRODUCT_DB);
$user = $_SESSION['user'];
$user_id = -1;
$ord = $_GET["order_confirmation"];

if(isset($user)) {
  $user_id = fetchUserID($user, $con);
  if ($ord) { // Check for cart data here
      $order_id = pushUserOrderData($con, $user_id);
  }
} else {
  header("Location: login/login.php");
  exit();
}
      ?>

<div class = "container product">
    <div class = "row justify-content-center">
            <h3>Order Page</h>
      </div>
      <div class = "row">
      <div class="col-lg-3 p-1 my-auto text-center">
          <p>Product Image</p>
      </div>
      <div class="col-lg-6 p-1 my-auto text-center">
          <p>Product Name</p>
      </div>
      <div class = "col-lg-3 p-1 my-auto text-center">
          <p>Product Price</p>
      </div>
      </div>
    </div>
</div>
<script>
    var url = '/assets/php/functions/getProducts.php?order_id=<?php echo $order_id?>';
    formatCartData(url);
</script>

<?php include 'footer.php';?>
