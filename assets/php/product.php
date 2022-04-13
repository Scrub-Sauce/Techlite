<!doctype html>
<!-- http://ec2-44-202-10-232.compute-1.amazonaws.com/assets/php/product.php -->

<?php
include_once ".env.php";
include 'header.php';

$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, PRODUCT_DB);

//verify connection
if (!$con) {
    exit("<p class='error'>Connection Error: " . mysqli_connect_error() . "</p>");
}
session_start();

$action = intval(isset($_SERVER['QUERY_STRING']) ? $_SERVER['QUERY_STRING'] : '');
$sql_product = "SELECT * FROM product_info WHERE product_info.id = {$action}";
$result = mysqli_query($con,$sql_product) or die(mysqli_error($connect));
$data = array();
foreach ($result as $row){
    $data[] = $row;
}
$product_name = $data[0]["product_name"];
$product_desc = $data[0]["product_desc"];
$product_price = $data[0]["product_price"];

$product_image = $data[0]["product_image"];
$product_image2 = $data[0]["product_image2"];
$product_image3 = $data[0]["product_image3"];
?>
<div class = "row mt-5">
<div class = "col-3">
    <p>
        <a href="products.php">
        <i class="fa fa-arrow-left" aria-hidden="true">
        </i>
        Go back</p>
    </a>
</div>
</div>
	    <div class="row mt-1">
            <div class = "col-4 my-5">
                <div class = "card border-light">
                <img src="<?php echo $product_image ?>" width="100%" class="productImage">
                <div class = "row">
                    <div class = "col-4">
                        <img src="<?php echo $data[0]["product_image"]?>" width="100%" class="productImage">
                    </div>
                    <div class = "col-4">
                        <img src="<?php echo $data[0]["product_image2"]?>" width="100%" class="productImage">
                    </div>
                    <div class = "col-4">
                        <img src="<?php echo $data[0]["product_image3"]?>" width="100%" class="productImage">
                    </div>
                </div>
                <div class = "row mt-3 mx-auto">
                    <a class="btn btn-primary" href="#">Add to Cart</a>
                </div>
                <div class = "row mt-1 mx-auto">
                    <h3>$<?php echo $product_price?></h3>
                </div>
                <div class = "row mt-1 mx-auto">
                    <p>More details</p>
                </div>
            </div>
            </div>
            <div class = "col-8 my-auto">
                <h3><?php echo $product_name?></h3>
    		    <p><?php echo $product_desc?></p>
                <p>- Item details</p>
                <p>- Item details</p>
                <p>- Item details</p>
                <p> In Stock </p>
            </div>
        </div>
<?php include 'footer.php'; ?>
