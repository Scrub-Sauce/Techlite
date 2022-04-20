<!-- http://ec2-44-202-10-232.compute-1.amazonaws.com/assets/php/products.php -->

<?php include 'header.php';
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>

<div class = "container product"></div>

<script>
    formatProductData('/assets/php/functions/getProducts.php');
</script>

<?php include 'footer.php';?>
