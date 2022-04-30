<?php
function redirect($uri){?>
	<script type="text/javascript">
	<!--
	document.location.href="<?php echo $uri; ?>";
	-->
	</script>
<?php die;}

function db_iconnect($db){
	$user_name="root";
	$password="X(aC34Xp9v=W]Kt9";
	$hostname="localhost";
	$dblink=new mysqli($hostname, $user_name, $password, $db);
	return $dblink;
}
?>