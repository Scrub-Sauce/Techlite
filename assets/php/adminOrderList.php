<?php include 'header.php';
      include_once ".env.php";
?>
    <div class = "container orders">
        <div class="alert alert-success" role="alert">
            
        </div>
        <nav class = "navbar navbar-expand-sm navbar-dark bg-dark mb-3">
            <div class = "container">
                <ul class = "navbar-nav">
                    <li class = "nav-item">
                        <a class = "nav-link" href="/assets/php/productAdmin.php">Product List</a>
                    </li>
                    <li class = "nav-item">
                        <a class = "nav-link" href="/assets/php/orderList.php">Order List</a>
                    </li>
                    <li class = "nav-item">
                        <a class = "nav-link" href="#">Admin Panel</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="row">
            <div class = "col-2">
                <p>Customer name</p>
            </div>
            <div class = "col-2">
                    <p>Order Number</p>
            </div>
            <div class = "col-2">
                    <p>Order total</p>
            </div>
            <div class = "col-2">
                <p>Total items</p>
            </div>
            <div class = "col-2">
                <p>Order date</p>
            </div>
            <div class = "col-2">
                <p>Submit Changes</p>
            </div>
        </div>
        <div class = "orderList">

        </div>
    </div>
    <script>
      
    </script>
<?php include 'footer.php' ?>
