<script src="../../../js/jquery-3.5.1.js"></script>
<?php include 'header.php';
      include_once ".env.php";

echo '<html>';
	echo '<head>';
  		echo '<title>Techlite | Helper Tickets</title>';
		echo '<meta charset="utf-8">';
		echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
        echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
        crossorigin="anonymous">';
 	echo '</head>';
	echo '<body>';
		echo '<div class = "container product">';
        	echo '<div class="alert alert-success" role="alert">';
        	echo '</div>';
        	echo '<div class="card">';
				echo '<div class="card-header">';
					echo '<div class="row">';
						echo '<div class = "col-3">';
							echo '<label>Ticket ID</label>';
						echo '</div>';
						echo '<div class = "col-3">';
							echo '<label>Customer Name</label>';
						echo '</div>';
						echo '<div class = "col-3">';
							echo '<label>Email</label>';
						echo '</div>';
						echo '<div class = "col-3">';
							echo '<label>Phone Number</label>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
			echo '<div id="content">';
?>
	<script>
		function refresh_div(){
			$.ajax({
				type: 'get',
				url: 'https://ec2-44-202-10-232.compute-1.amazonaws.com/assets/php/functions/query_entries.php',
				success: function(data){
					$('#content').html(data);
				}
			});
		};
		setInterval(function(){refresh_div();}, 500);
	</script>
<?php		echo '</div>';
		echo '</div>';
	echo '</body>';
echo '</html>';
?>
