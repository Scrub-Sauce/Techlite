<!doctype html>

<?php include "assets/php/header.php"; ?>
<html lang="en" dir="ltr">
	<head>
  		<title>Techlite | Home</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
        crossorigin="anonymous">
 	</head>
 	<body>
		<div class="container">
			<div id="slider4" class="carousel slide mb-5" data-ride="carousel">
				<ol class="carousel-indicators">
					<li class="active" data-target="#slider4" data-slide-to="0"></li>
					<li data-target="#slider4" data-slide-to="1"></li>
					<li data-target="#slider4" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img class="d-block img-fluid" src="https://www.princetonhcs.org/-/media/images/care-and-services/princeton-house-behavioral-health/newsletters/winter-2021-spotlight-1280x780.jpg?mw=1224" alt="First Slide">
						<div class="carousel-caption d-none d-md-block">
							<h3>Premium Products</h3>
							<p>Techlite carries premium products to keep you on the cutting edge. Whether its running an office, developing the next earth shattering software, or producing excellence in the e-sport arena, we've got you covered.</p>
						</div>
					</div>
					<div class="carousel-item">
						<img class="d-block img-fluid" src="https://c.wallhere.com/photos/e5/6f/fantasy_art-215189.jpg!d" alt="First Slide"><br>
						<div class="carousel-caption d-none d-md-block">
							<h3>Winter Sale</h3>
							<p>Out with the old and in with the new. All of last generations finest titles now available at a steal. Find your next adventure with Techlite</p>
						</div>
					</div>
					<div class="carousel-item">
						<img class="d-block img-fluid" src="https://www.computerweekly.com/visuals/German/article/ethical-hacker-adobe.jpg" alt="First Slide">
						<div class="carousel-caption d-none d-md-block">
							<h3>Expert Assistance</h3>
							<p>Caught that power supply on fire again? Not to worry! Techlite has expert assistance available 24/7 to help you keep that DIY build at professional quality.</p>
						</div>
					</div>
				</div>
			</div>
			<div class = "container product">
			</div>
			<script>formatProductData('/assets/php/getProducts.php');</script>
		</div>
 	</body>
</html>
<?php include "assets/php/footer.php"; ?>
