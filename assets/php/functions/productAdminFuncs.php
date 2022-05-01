<?php
include_once "../.env.php";
include_once 'phpFunctions.php';

# Connect to DB
$con = connectDB(PRODUCT_DB);

# Check if user selects add product button and adds it to SQL database
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

# Check if user has updated product info and modifies it in the SQL database
if(isset($_POST['update'])) {
    $product_id = $_POST["prod_id"];
    $product_image = $_POST["prod_img"];
    $product_name = $_POST["prod_name"];
    $product_desc = $_POST["prod_desc"];
    $product_price = $_POST["prod_price"];
    $product_qty = $_POST['prod_qty'];
    $update_sql = "UPDATE product_info SET product_name='$product_name',
    product_price = '$product_price',
    product_desc = '$product_desc',
    product_image = '$product_image',
    product_qty = '$product_qty'
    WHERE id = '$product_id'";
    $results = mysqli_query($con,$update_sql) or trigger_error("Query Failed! SQL: $search_sql - Error: ".mysqli_error($con), E_USER_ERROR);
    echo "Successfully updated product: <br />ID: $product_id<br />NAME: $product_name<br />DESC: $product_desc<br />IMG: $product_image<br />PRICE: $$product_price<br />QTY: $product_qty";
}

# Check if user selects delete on a product and removes it from the SQL database 
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
