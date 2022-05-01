<?php include 'header.php';
      include_once ".env.php";
?>
    <div class = "container orders">
        <div class="alert alert-success" role="alert">

        </div>
        <div class="row">
            <div class = "col-2">
                <p>Order number</p>
            </div>
            <div class = "col-2">
                <p></p>
            </div>
            <div class = "col-2">
                <p></p>
            </div>
            <div class = "col-2">
                <p></p>
            </div>
            <div class = "col-2">
                <p></p>
            </div>
            <div class = "col-2">
                <p>Details</p>
            </div>
        </div>
        <div class = "orderList">
        </div>
    </div>
    <script>
      orderAdminPanel("functions/getOrders.php");
    </script>
<?php include 'footer.php' ?>
