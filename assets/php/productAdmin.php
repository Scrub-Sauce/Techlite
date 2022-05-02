<?php include 'header.php';
      include_once ".env.php";
?>
    <div class = "container product">
        <div class="alert alert-success" role="alert">
            <?php include 'functions/productAdminFuncs.php'; ?>
        </div>
        <div class="card">
        <div class="card-header">
        <div class="row">
            <div class = "col-3">
                <p>Product ID</p>
            </div>
            <div class = "col-6">
                <p>Product Name</p>
            </div>
            <div class = "col-3">
                <p>Details</p>
            </div>
        </div>
    </div>
    <form onSubmit="if(!confirm('Are you sure you would like to do this?')){return false;}" method = "post" action = "">
        <div class="card">
            <div class="card-header">
            <div class="row">
            <div class = "col-2 float-left">
                    <p>Add New Product:</p>
              </div>
              <div class = "col-2 float-left">
                    <input type = "text" name = "prod_img">
              </div>
              <div class = "col-2 float-left">
                    <input type = "text" name = "prod_name">
              </div>
              <div class = "col-2 float-left">
                  <input type = "text" name = "prod_desc">
              </div>
              <div class = "col-2 float-left">
                  <input type = "text" name = "prod_price">
              </div>
              <div class = "col-2 float-left">
                  <input type="submit" name = "add" value="Add">
              </div>
            </div>
        </form>
</div>
</div>
    <script>
      var url = '/assets/php/functions/getProducts.php';
      productAdminPanel(url);
    </script>
<?php include 'footer.php' ?>
