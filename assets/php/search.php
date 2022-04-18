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
<script>
var url = '/assets/php/searchFunc.php?query=<?php echo $query?>';
formatProductData(url);</script>
<?php include 'footer.php';
echo $query;
?>
