<?php include 'header.php';
      include_once ".env.php";
?>
    <div class = "container orders">
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
      orderAdminPanel("functions/getOrders.php");
    </script>
<?php include 'footer.php' ?>
