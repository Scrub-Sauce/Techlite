<?php include 'header.php';
      include_once ".env.php";
?>
    <div class = "container product">
        <div class="alert alert-success" role="alert">
            <?php include 'functions/productAdminFuncs.php'; ?>
        </div>
        <div class="row">
              <div class = "col-lg-2">
                  <p>Product ID</p>
              </div>
              <div class = "col-lg-8">
                    <p>Product Name</p>
              </div>
              <div class = "col-lg-2">
                  <p>Details</p>
              </div>
        </div>
    </div>
    <script>
      var url = '/assets/php/functions/getProducts.php';
      productAdminPanel(url);
    </script>
<?php include 'footer.php' ?>
