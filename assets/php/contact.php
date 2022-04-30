<?php 
include("functions/contactFunc.php");
include("header.php");

session_start();
echo '<html lang="en" dir="ltr">';
	echo '<head>';
		echo '<title>Techlite | Contact us</title>';
		echo '<meta charset="utf-8">';
		echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
        echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">';
		echo '<script src="../js/contactValidate.js"></script>';
	echo '</head>';
	echo '<body>';
		echo '<div id="container" class="container">';
		echo '<h1 class="display-4">Contact Us</h1>';
		echo '<div class="panel panel-primary">';
			echo '<div class="panel-body">';
			if(isset($_GET['msg']) && $_GET['msg']=="success"){
				 echo '<div class="alert alert-success" role="alert">Your entry has been recieved!</div>';
			}

				echo '<form method="post" action="">';	
					if(isset($_GET['err']) && strstr($_GET['err'],"fnameNull")){
						echo '<div class="form-group">';
							echo '<label>First Name:</label>';
							echo '<input class="form-control " name="fname" type="text" id="fname" onBlur="valfName();" >';
							echo '<p class="help-block" id="fnameHelp"><div class="alert alert-danger" role="alert">This field is required.</div></p>';
						echo '</div>';
					}else{
						echo '<div class="form-group">';
							echo '<label>First Name:</label>';
							if(isset($_SESSION['fName']) && $_SESSION['fName']!="")
								echo '<input class="form-control " name="fname" type="text" id="fname" onBlur="valfName();" value="'.$_SESSION['fName'].'">';
							else
								echo '<input class="form-control " name="fname" type="text" id="fname" onBlur="valfName();">';
							echo '<p class="help-block" id="fnameHelp"></p>';
						echo '</div>';
					}
					if(isset($_GET['err']) && strstr($_GET['err'],"lnameNull")){
						echo '<div class="form-group">';
							echo '<label>Last Name:</label>';
							echo '<input class="form-control" name="lname" type="text" id="lname" onBlur="vallName();">';
							echo '<p class="help-block" id="lnameHelp"><div class="alert alert-danger" role="alert">This field is required.</div></p>';
						echo '</div>';
					}else{
						echo '<div class="form-group">';
							echo '<label>Last Name:</label>';
							if(isset($_SESSION['lName']) && $_SESSION['lName']!="")
								echo '<input class="form-control" name="lname" type="text" id="lname" onBlur="vallName();" value="'.$_SESSION['lName'].'">';
							else
								echo '<input class="form-control" name="lname" type="text" id="lname" onBlur="vallName();">';
							echo '<p class="help-block" id="lnameHelp"></p>';
						echo '</div>';
					}
					if(isset($_GET['err']) && strstr($_GET['err'],"emailNull")){
						echo '<div class="form-group">';
								echo '<label>Email:</label>';
								echo '<input class="form-control" name="email" type="text" id="email" onBlur="valEmail();">';
								echo '<p class="help-block" id="emailHelp"><div class="alert alert-danger" role="alert">This field is required.</div></p>';
						echo '</div>';
					}else{
						echo '<div class="form-group">';
							echo '<label>Email:</label>';
							if(isset($_SESSION['email']) && $_SESSION['email']!="")
								echo '<input class="form-control" name="email" type="text" id="email" onBlur="valEmail();" value="'.$_SESSION['email'].'">';
							else
								echo '<input class="form-control" name="email" type="text" id="email" onBlur="valEmail();">';
							echo '<p class="help-block" id="emailHelp"></p>';
						echo '</div>';
					}
					if(isset($_GET['err']) && strstr($_GET['err'],"phoneNull")){
						echo '<div class="form-group">';
							echo '<label>Phone Number:</label>';
							echo '<input class="form-control" type="text" name="phone" id="phone" onBlur="valPhone();">';
							echo '<p class="help-block" id="phoneHelp"><div class="alert alert-danger" role="alert">This field is required.</div></p>';
						echo '</div>';
					}else{
						echo '<div class="form-group">';
							echo '<label>Phone Number:</label>';
							if(isset($_SESSION['phone']) && $_SESSION['phone']!="")
								echo '<input class="form-control" type="text" name="phone" id="phone" onBlur="valPhone();" value="'.$_SESSION['phone'].'">';
							else
								echo '<input class="form-control" type="text" name="phone" id="phone" onBlur="valPhone();">';
							echo '<p class="help-block" id="phoneHelp"></p>';
						echo '</div>';
					}
					echo '<div class="form-group">';
						echo '<label>Comment:</label>';
						echo '<textarea class="form-control" name="comment" type="text" id="comment" rows="10" cols="30" maxlength="500" onBlur="valComment();"></textarea>';
					echo '</div>';
					echo '<div class="form-group">';
						echo '<p class="help-block" id="commentHelp"></p>';
						echo '<button name="submit" id="submit" class="form-control btn btn-block btn-success" type="submit" onclick="validateAll();">Submit</button>';
					echo '</div>';
				echo '</form>';
			echo '</div>';
		echo '</div>';
	echo '</div>';
	echo '</body>';
echo '</html>';


	if (isset($_POST['submit'])){
		$err="";
		$comment=addslashes($_POST['comment']);
		if (isset($_POST['fname']) && $_POST['fname']!="")
		{
			$firstName=addslashes($_POST['fname']);
			$_SESSION['fName']=$firstName;
		}else
			$err.="fnameNull";
		if (isset($_POST['lname']) && $_POST['lname']!="")
		{
			$lastName=addslashes($_POST['lname']);
			$_SESSION['lName']=$lastName;
		}else
			$err.="lnameNull";
		if (isset($_POST['email']) && $_POST['email']!="")
		{
			$email=$_POST['email'];
			$_SESSION['email']=$email;
		}else
			$err.="emailNull";
		if (isset($_POST['phone']) && $_POST['phone']!="")
		{
			$phone=$_POST['phone'];
			$_SESSION['phone']=$phone;
		}else
			$err.="phoneNull";
		if (isset($err) && $err!="")
		{
			redirect("/assets/php/contact.php?&err=$err");
		}
		$dblink = db_iconnect("contact_us");
		$sql="INSERT into `entries` (`first_name`, `last_name`, `email`, `phone`, `comment`) VALUES ('$firstName', '$lastName', '$email', '$phone', '$comment');";
		$dblink->query($sql) or
			die("Something went wrong with $sql<br>".$dblink->error);
		session_destroy();
		redirect("/assets/php/contact.php?&msg=success");
	}

include("footer.php");
?>