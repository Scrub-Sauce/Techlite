<?php include 'header.php';
      include_once ".env.php";
?>
    <div class = "container orders">
        <div class="alert alert-success" role="alert">
            
        </div>
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
        <div id="accordion">
            <div class="card">
                <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    #1
                    </button>
                </h5>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                    Display Data
                </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    #2
                    </button>
                </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body">
                    Display Data
                </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    #3
                    </button>
                </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body">
                    Display Data
                </div>
                </div>
            </div>
            </div>  
        </div>
    </div>
    <script>
      
    </script>
<?php include 'footer.php' ?>
