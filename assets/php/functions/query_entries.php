<?php
	include("contactFunc.php");
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

if(isset($_POST['delete'])){
	$ticket_id = $data['ticket_id'];
	echo $ticket_id;
	$delete_sql = "DELETE from `entries` where ticket_id = '$ticket_id'";
	$result2=$dblink->query($delete_sql)or
		die("Something went wrong with $sql<br>".$dblink->error);
	echo $ticket_id.' has been deleted.';
}
?>