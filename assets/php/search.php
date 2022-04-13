<!doctype html>
<!-- http://ec2-44-202-10-232.compute-1.amazonaws.com/assets/php/search.php -->

<?php include 'header.php';
$query = $_GET['query'];
function fetchSearchQuery() {
    global $query;
    return $query;
}
?>
<div class = "container product">
</div>
<script>formatProductData('searchFunc.php');</script>
<?php include 'footer.php';?>
