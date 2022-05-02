<?php include 'header.php';
      include_once ".env.php";

      $sort_by = "";
      if(isset($_POST['sort_by_id'])) {
            $sort_by = "order_id";
      }
      if(isset($_POST['sort_by_date'])) {
            $sort_by = "order_date";
      }
      if(isset($_POST['sort_by_size'])) {
            $sort_by = "total";
      }
?>
    <div class = "container orders">
        <div class = "row justify-content-center my-2">
            <form class="form-inline" method="POST" action = "">
                <input class="btn btn-primary mx-3" type="submit" name ="sort_by_id" value = "Sort by ID">
                <!-- <input class="form-control mr-sm-2" type="submit" name ="sort_by" placeholder="Search" aria-label="Search">  -->
                <input class="btn btn-primary mx-3" type="submit" name ="sort_by_date" value = "Sort by Date">
                <input class="btn btn-primary mx-3" type="submit" name ="sort_by_size" value = "Sort by Price">
            </form>
        </div>
        <div class="alert alert-success" role="alert">

        </div>
        <div class="card">
        <div class="card-header">
        <div class="row">
            <div class = "col-3">
                <p>Order Number</p>
            </div>
            <div class = "col-6">
                <p>Order Date</p>
            </div>
            <div class = "col-3">
                <p>Details</p>
            </div>
        </div>
    </div>
</div>
</div>
    <script>
      orderAdminPanel("functions/getOrders.php?sort_by=<?php echo $sort_by?>");
    </script>
<?php include 'footer.php' ?>
