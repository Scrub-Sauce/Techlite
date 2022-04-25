<!doctype html>
<!-- http://ec2-44-202-10-232.compute-1.amazonaws.com/assets/php/header.php -->

<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
        crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://use.fontawesome.com/0a118d7728.js"></script>
        <script type ="text/javascript" src ="/assets/js/formatData.js"></script>
    </head>
    <body>
    	<div class = "container-flex">
        	<nav class="navbar navbar-expand-sm navbar-dark bg-dark mb-3">
				<div class="container">
					<a class="navbar-brand" href="../../../index.php">TECHLITE</a>
					<form class="form-inline" method="GET" action = "/assets/php/search.php">
  						<input class="form-control mr-sm-2" type="search" name ="query" placeholder="Search" aria-label="Search">
  						<button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
					</form>
					<ul class="navbar-nav">
						<li class="nav-item"><a class="nav-link" href="/assets/php/contact.php">Contact us</a></li>
						<li class="nav-item"><a class="nav-link" href="/assets/php/login/login.php">Login</a></li>
					</ul>
				</div>
			</nav>
			<?php include 'adminHeader.php' ?>
		</div>
	</body>
</html>

