<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
?>


<!DOCTYPE html>
<html>

<head>
	<title>Farmer's One Stop</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="styles/style.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- font awesome -->
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


</head>

<body>

	<!--header section code start-->
	<?php
	include("includes/header.php");
	?>
	<!--header section code end-->


	<div id="content">
		<div class="container">
			<!--Container Start-->
			<div class="col-md-12">
				<!--col-md-12 Start-->
				<ul class="breadcrumb">
					<li><a href="index.php">Home</a></li>
					<li>
						About Us
					</li>
				</ul>
			</div>
			<!--col-md-12 end-->

			<div class="col-md-2">

			</div>

			<div class="col-lg-8">
				<!--col-md-9 start-->
				<div class="box">
					<!--Box start-->
					<div class="box-header">
						<!--Box-header start-->
						<center>
							<h2>About Us</h2>
							<p class="text-muted">We at Farmer's One Stop are dedicated to help consumers directly buy the products from the farmers, thus eliminating the middlemen and provide fair value to the farmers to their crops.</p>
						</center>
					</div>
					<div>
						<div class="form-group">
							<label>Developers :</label>
							<ul>
								<li>GEETIK NIMONKAR (2019063)</li>
								<li>SHIVAM GUPTA (2019337)</li>
								<li>GAURANG VERMA (2019061)</li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<!-- <div class="panel-heading"> panel-heading start -->
			<!-- <h1 class="text-center">ABOUT US</h1> -->
			<!-- </div> panel-heading end -->














			<div class="container"></div><!-- for seperating footer background color from shop background color -->

			<!--Footer start-->
			<?php
			include("includes/footer.php");
			?>
			<!--Footer end-->


			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>

</html>