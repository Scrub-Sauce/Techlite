<!doctype html>
<!-- http://ec2-44-202-10-232.compute-1.amazonaws.com/assets/php/search.php -->

<?php include 'header.php';
      // $user = $_SESSION['user'];
      ?>

<div class = "container product">
    <div class = "row justify-content-center">
            <h3>User Cart</h>
      </div>
</div>
<script>
    var url = '/assets/php/functions/getProducts.php?user_id=<?php echo $user ?>';
    formatProductData(url);
</script>

<?php include 'footer.php';?>
