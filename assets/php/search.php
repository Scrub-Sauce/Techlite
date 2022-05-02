<!doctype html>
<!-- http://ec2-44-202-10-232.compute-1.amazonaws.com/assets/php/search.php -->

<?php include 'header.php';
      $query = $_GET['query'];
      $sort_by = "";
      if(isset($_POST['sort_by_price'])) {
            $sort_by = "product_price";
      }
      if(isset($_POST['sort_by_qty'])) {
            $sort_by = "product_qty";
      }
      ?>


<div class = "container product">
    <div class = "row justify-content-center my-2">
        <form class="form-inline" method="POST" action = "">
            <input class="btn btn-primary mx-3" type="submit" name ="sort_by_qty" value = "Sort by Qty" readonly>
            <!-- <input class="form-control mr-sm-2" type="submit" name ="sort_by" placeholder="Search" aria-label="Search">  -->
            <input class="btn btn-primary mx-3" type="submit" name ="sort_by_price" value = "Sort by Price">
        </form>
    </div>
</div>
<script>
    var url = '/assets/php/functions/getProducts.php?query=<?php echo $query?>&sort_by=<?php echo $sort_by?>';
    formatProductData(url);
</script>

<?php include 'footer.php';?>
