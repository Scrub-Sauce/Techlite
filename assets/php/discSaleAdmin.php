<?php include 'header.php';
      include_once ".env.php";
      include_once "functions/phpFunctions.php";
      $con = connectDB(DATABASE);
?>
    <div class = "container orders">
        <div class="alert alert-success" role="alert">
        <?php
              if (isset($_POST['discount'])){
                  if (isset($_POST['sale']) && isset($_POST['amount'])) {
                      $sale = $_POST['sale'];
                      $amount = $_POST['amount'];
                      $sql_sale = "INSERT INTO registrar.promo_codes (percent_off, code) VALUES ('$amount', '$sale')";
                      $result = mysqli_query($con,$sql_sale) or die(mysqli_error($con));
                      echo "Successfully added discount code $sale for $amount% off!";
                  }
              }
        ?>
        </div>
        <div class="card">
        <div class="card-header">
        <form class="form-inline" method="POST" action = "">
        <div class="row">
            <div class = "col-4">
                <p>Discount Amount</p>
                <input class = "w-100" type = "text" name = "amount">
            </div>
            <div class = "col-4">
                <p>Discount Code</p>
                <input class = "w-100" type = "text" name = "sale">
            </div>
            <div class = "col-4">
                <p>Create Discount</p>
                <input class = "btn btn-success w-100" type = "submit" name = "discount" value = "Add Discount">
            </div>
        </div>
    </form>
    </div>
</div>
</div>
    <script>

    </script>
<?php include 'footer.php' ?>
