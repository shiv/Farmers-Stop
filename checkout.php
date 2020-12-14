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
						Checkout
					</li>
				</ul>
			</div>
			<!--col-md-12 end-->

			<!--spacing from left side-->
			<div class="col-md-2">

			</div>

			<div class="col-md-8">
				<!--col-md-9 start-->
				<?php
				if (!isset($_SESSION['customer_email'])) {
					include('customer/customer_login.php');
				} else
					include('payment_options.php');
				?>
			</div>
			<!--col-md-9 end-->



		</div>
		<!--Container end-->
	</div>
	<!--content end-->


	<!--Footer start-->
	<?php
	include("includes/footer.php");
	?>
	<!--Footer end-->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>

</html>