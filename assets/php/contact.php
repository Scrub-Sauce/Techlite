<!doctype html>
<!-- http://ec2-44-202-10-232.compute-1.amazonaws.com/assets/php/login/recover.php -->

<?php include "header.php";?>
<html lang="en" dir="ltr">
	<head>
		<title>Techlite | Contact us</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
        crossorigin="anonymous">
		<script src="../js/contactValidate.js"></script>
	</head>
	<body>
		<div id="container">
			<div class="form-group my-1">
				<label>First Name:</label>
				<input class="form-control" type="text" id="fname" onBlur="valfName();">
				<p class="help-block" id="fnameHelp"></p>
			</div>
			<div class="form-group">
				<label>Last Name:</label>
				<input class="form-control" type="text" id="lname" onBlur="vallName();">
				<p class="help-block" id="lnameHelp"></p>
			</div>
			<div class="form-group">
				<label>Email:</label>
				<input class="form-control" type="text" id="email" onBlur="valEmail();">
				<p class="help-block" id="emailHelp"></p>
			</div>
			<div class="form-group">
				<label>Phone Number:</label>
				<input class="form-control" type="text" id="phone" onBlur="valPhone();">
				<p class="help-block" id="phoneHelp"></p>
			</div>
			<div class="form-group">
				<label>Prefered Contact Method:</label>
				<input type="radio" id="prefPhone" name="prefMethod" value="Phone" onBlur="valPrefMethod();">
				<label>Phone</label>
				<input type="radio" id="prefEmail" name="prefMethod" value="Email" onBlur="valPrefMethod();">
				<label>Email</label>
				<p class="help-block" id="prefHelp"></p>
			</div>
			<div class="form-group">
				<label>Coment:</label>
				<textarea class="form-control" type="text" id="comment" rows="10" cols="30" maxlength="500" onBlur="valComment();"></textarea>
				<p class="help-block" id="commentHelp"></p>
			</div>
			<button id="submit" class="btn btn-block btn-success" type="submit" onclick="validateAll();">Submit</button>
			<div id="result"></div>
		</div>
	</body>
</html>

<?php include "footer.php";?>