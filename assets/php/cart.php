<!doctype html>
<!-- http://ec2-44-202-10-232.compute-1.amazonaws.com/assets/php/search.php -->

<?php
include 'header.php';
include_once 'functions/phpFunctions.php';
include_once '.env.php';
include_once 'authentication.php';

$con = connectDB(PRODUCT_DB);
$user = $_SESSION['user'];
$user_id = -1;
$prod = $_GET["prod"];

if(isset($user)) {
  $user_id = fetchUserID($user, $con);
  if (isset($prod)) {
      pushUserCartData($prod, $user_id, $con);
  }
} else {
  header("Location: login/login.php");
  exit();
}
      ?>

<div class = "container product">
    <div class = "row justify-content-center">
            <h3>User Cart</h>
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
    var url = '/assets/php/functions/getProducts.php?user_id=<?php echo $user_id;?>';
    formatCartData(url);
</script>
<div class = "row justify-content-center">
      <a href = "checkout.php" class="btn btn-lg btn-primary mt-5 mb-3" role="button" aria-pressed="true">Checkout</a>
</div>

<?php include 'footer.php';?>
