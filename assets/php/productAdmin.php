<?php include 'header.php';
      include_once ".env.php";
?>
    <div class = "container product">
        <div class="alert alert-success" role="alert">
            <?php include 'productAdminFuncs.php'; ?>
        </div>
        <div class="row">
              <div class = "col-2">
                  <p>Product ID</p>
              </div>
              <div class = "col-2">
                    <p>Product Image</p>
              </div>
              <div class = "col-2">
                    <p>Product Name</p>
              </div>
              <div class = "col-2">
                  <p>Product Description</p>
              </div>
              <div class = "col-2">
                  <p>Product Price</p>
              </div>
              <div class = "col-2">
                  <p>Submit Changes</p>
              </div>
        </div>
    </div>
    <script>
      var url = '/assets/php/test-sql.php';
      productAdminPanel(url);
    </script>
<?php include 'footer.php' ?>
