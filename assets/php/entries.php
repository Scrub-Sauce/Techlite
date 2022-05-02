<script src="../../../js/jquery-3.5.1.js"></script>
<?php include 'header.php';
      include_once ".env.php";
	  include("functions/contactFunc.php");

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


$dblink=db_iconnect("contact_us");
$sql="Select * from `entries`";
$result=$dblink->query($sql) or
	die("Something went wrong with $sql<br>".$dblink->error);
while($data=$result->fetch_array(MYSQLI_ASSOC)){
echo '<div class="card">';
	echo '<div class="card-body">';
		echo '<form onSubmit="if(!confirm(\'Are you sure you would like to do this?\')){return false;}" method = "post" action = "">';
			echo '<div class="row">';
				echo '<div class="col-lg-3">';
					echo '<label>Ticket: '.$data['ticket_id'].'</label>';
					echo '<input type="hidden" name="ticket_id" value="'.$data['ticket_id'].'"/>';
				echo '</div>';
				echo '<div class="col-lg-3">';
					echo '<label>Name: '.$data['first_name'].' '.$data['last_name'].'</label>';
				echo '</div>';
				echo '<div class="col-lg-3">';
					echo '<label>Email: '.$data['email'].'</label>';
				echo '</div>';
				echo '<div class="col-lg-3">';
					echo '<label>Phone Number: '.$data['phone'].'</label>';
				echo '</div>';
			echo '</div>';
			echo '<div class="row">';
				echo '<div class="col-lg-9">';
					echo '<label>Comment: '.$data['comment'].'</label>';
				echo '</div>';
				echo '<div class="col-lg-3">';
					echo '<input class="btn btn-danger" type="submit" role="button" name="delete" value="Delete"></input>';
				echo '</div>';
			echo '</div>';
		echo '</form>';
	echo '</div>';
echo '</div>';
}
echo '</div>';
echo '</div>';
echo '</body>';
echo '</html>';

if(isset($_POST['delete'])){
	$ticket_id = $_POST['ticket_id'];
	$delete_sql = "DELETE from `entries` where ticket_id = '$ticket_id'";
	$result2=$dblink->query($delete_sql)or
		die("Something went wrong with $sql<br>".$dblink->error);
	echo '<div class="alert alert-success" role="alert">'.$ticket_id.' has been deleted.</div>';
}  

header("Refresh:0, url=entries.php");
?>
