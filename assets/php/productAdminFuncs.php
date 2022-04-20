<?php
include_once ".env.php";

// error_reporting(E_ALL);
// ini_set('display_errors', '1');
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, PRODUCT_DB);
if (!$con) {
    exit("<p class='error'>Connection Error: " . mysqli_connect_error() . "</p>");
}
session_start();
    if(isset($_POST['add'])) {
        $product_image = $_POST["prod_img"];
        $product_name = $_POST["prod_name"];
        $product_desc = $_POST["prod_desc"];
        $product_price = $_POST["prod_price"];
        $add_sql = "INSERT INTO product_info(product_name, product_price, product_desc, product_image)
                    VALUES('$product_name', '$product_price', '$product_desc','$product_image')";
        $results = mysqli_query($con,$add_sql) or trigger_error("Query Failed! SQL: $search_sql - Error: ".mysqli_error($con), E_USER_ERROR);
        echo "Successfully added product: <br />NAME: $product_name<br />DESC: $product_desc<br />IMG: $product_image<br />PRICE: $$product_price";
    }
    if(isset($_POST['update'])) {
        $product_id = $_POST["prod_id"];
        $product_image = $_POST["prod_img"];
        $product_name = $_POST["prod_name"];
        $product_desc = $_POST["prod_desc"];
        $product_price = $_POST["prod_price"];
        $update_sql = "UPDATE product_info SET product_name='$product_name',
        product_price = '$product_price',
        product_desc = '$product_desc',
        product_image = '$product_image'
        WHERE id = '$product_id'";
        $results = mysqli_query($con,$update_sql) or trigger_error("Query Failed! SQL: $search_sql - Error: ".mysqli_error($con), E_USER_ERROR);
        echo "Successfully updated product: <br />ID: $product_id<br />NAME: $product_name<br />DESC: $product_desc<br />IMG: $product_image<br />PRICE: $$product_price";
    }
    if(isset($_POST['delete'])) {
        $product_id = $_POST["prod_id"];
        $product_image = $_POST["prod_img"];
        $product_name = $_POST["prod_name"];
        $product_desc = $_POST["prod_desc"];
        $product_price = $_POST["prod_price"];
        $delete_sql = "DELETE from product_info where id = '$product_id'";
        $results = mysqli_query($con,$delete_sql) or trigger_error("Query Failed! SQL: $search_sql - Error: ".mysqli_error($con), E_USER_ERROR);
        echo "Successfully deleted product: <br />ID: $product_id<br />NAME: $product_name<br />DESC: $product_desc<br />IMG: $product_image<br />PRICE: $$product_price";
    }
    ?>
