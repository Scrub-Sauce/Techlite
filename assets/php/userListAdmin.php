<?php include 'header.php';
      include_once ".env.php";
?>
    <div class = "container users">
        <div class="alert alert-success" role="alert">

        </div>
        <div class="card">
        <div class="card-header">
        <div class="row">
            <div class = "col-3">
                <p>ID#</p>
            </div>
            <div class = "col-6">
                <p>Email</p>
            </div>
            <div class = "col-3">
                <p>Details</p>
            </div>
        </div>
    </div>
</div>
</div>
    <script>
      formatUserData("functions/getUsers.php");
    </script>
<?php include 'footer.php' ?>
