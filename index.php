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
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie-edge">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="styles/style.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- font awesome -->
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


</head>
<body>
	
	<div id="top"> <!--Top Bar Start--> 
		<div class="container"> <!--Container start--> 
			<div class="col-md-6 offer"> <!--col-md-6 offer start-->
				<a href="#" class="btn btn-success btn-sm">

          <?php
          if (!isset($_SESSION['customer_email'])) {
              echo "Welcome Guest";
          }else{
              echo "Welcome: " .$_SESSION['customer_email'] . "" ;
          }
          ?>
          				
        </a>

				<a href="#">Shopping Cart Total Price: INR <?php totalPrice();?> , Total Items <?php item();?> </a>

			</div><!--col-md-6 offer end-->
	        <div class="col-md-6">
	        	<ul class="menu">
	        		<li>
	        			<a href="customer_registration.php"> Register </a>
	        		</li>
	        		<li>
                
                <?php
                if (!isset($_SESSION['customer_email'])) {
                    echo "<a href='checkout.php'>My Account</a>";
                }else{
                    echo "<a href='customer/my_account.php?my_order'>My Account</a>";
                }
                ?>
	        		
              </li>
	        		<li>
	        			<a href="cart.php"> Go To Cart </a>
	        		</li>
	        		<li>
                <?php
                if (!isset($_SESSION['customer_email'])) {
                    echo "<a href='checkout.php'> Login </a>";
                }else{
                  echo "<a href='logout.php'> Logout </a>";
                }
                ?>
	        		</li>
	        	</ul>
	        	
	        </div>

        </div> <!--Container end--> 

	</div> <!--Top Bar end--> 

	<div class="navbar navbar-default" id="navbar"> <!--navbar navbar-default start--> 
		<div class="container">
			<div class="navbar-header"> <!--navbar-header start-->
				<a class="navbar-brand home" href="index.php">
					<img src="images/logo.png" alt="FOS Store" id="logo-xs" class="hidden-xs img-responsive" width="105" height="60">
					<img src="images/logo.png" alt="FOS Store" id="logo-xs" class="visible-xs img-responsive" >
				</a>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
					<span class="sr-only"> Toogle Navigation </span>
					<i class="fa fa-align-justify"> </i>
				</button>
				<button type="button" class="navbar-toggle" data-toogle="collapse" data-target="#search">
					<span class="sr-only"></span>
					<i class="fa fa-search"></i>
				</button>
			</div><!--navbar-header end-->

            <div class="navbar-collapse collapse" id="navigation"> <!--navbar-collapse collapse start-->
            	<div class="padding-nav"> <!--padding-nav start-->
            		<ul class="nav navbar-nav navbar-left">

            			<li class="active">
            				<a href="index.php"> Home </a>
            			</li>
            			<li>
            				<a href="shop.php"> Shop </a>
            			</li>
            			<li>
            				<?php
                    if (!isset($_SESSION['customer_email'])) {
                    echo "<a href='checkout.php'>My Account</a>";
                    }else{
                    echo "<a href='customer/my_account.php?my_order'>My Account</a>";
                    }
                    ?>
            			</li>
            			<li>
            				<a href="cart.php"> Shopping Cart </a>
            			</li>
            			<li>
            				<a href="about.php"> About Us </a>
            			</li>
            			<li>
            				<a href="contactus.php"> Contact Us </a>
            			</li>
            			
            		</ul>          		
            	</div><!--padding-nav end-->

                <a href="cart.php" class="btn btn-primary navbar-btn right">
                	<i class="fa fa-shopping-cart"></i>
                	<span> <?php item();?> items In Cart</span>
                </a>

                <div class="navbar-collapse collapse right"> <!--navbar-collapse collapse-right start-->
                	<button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="#search">
                		<span class="sr-only"> Toggle Search</span>
                		<i class="fa fa-search"></i>
                	</button>
                </div> <!--navbar-collapse collapse-right end-->
          		
          		<div class="collapse clearfix" id="search">
          			<form class="navbar-form" method="get" action="result.php"></form>
          			<div class="input-group" >
          				<input type="text" name="user_query" placeholder="Search" class="form-control" required="">
      	   
  <span class="input-group-btn"> <button type="submit" value="Search" name="search" class="btn btn-primary">
          					<i class="fa fa-search"></i>
          				</button>   </span>         
          
          			</div>
          		</div>
            </div> <!--navbar-collapse collapse end-->  
		</div>
	</div> <!--navbar navbar-default end--> 

</div><!--container end-->

<div id="slider"> <!-- class="container" container start-->
    <div class="col-lg-12"> <!--col-md-12 start-->
      <div class="carousel slide" id="myCarousel" data-ride="carousel"> <!--carousel-slide start-->
        <ol class="carousel-indicators">
          <li data-target="myCarousel" data-slide-to="0" class="action"></li>
          <li data-target="myCarousel" data-slide-to="1" ></li>
          <li data-target="myCarousel" data-slide-to="2" ></li>
          <li data-target="myCarousel" data-slide-to="3" ></li>
        </ol>

        <div class="carousel-inner"> <!--carousel-inner start-->
          
          <?php
          $get_slider= "select * from slider LIMIT 0,1";
          $run_slider= mysqli_query($con,$get_slider);
          while ($row=mysqli_fetch_array($run_slider)){
              $slider_name=$row['slider_name'];
              $slider_image=$row['slider_image'];
              echo "<div class='item active'>
                  <img src='admin_area/slider_images/$slider_image'>
              </div> ";
          }
          ?>

          <?php
          $get_slider= "select * from slider LIMIT 1,3";
          $run_slider= mysqli_query($con,$get_slider);
          while ($row= mysqli_fetch_array($run_slider)) {
              $slider_name= $row['slider_name'];
              $slider_image= $row['slider_image'];
              echo "<div class= 'item'>
                  <img src= 'admin_area/slider_images/$slider_image'>
              </div>";
          }
          ?>

        </div><!--carousel-inner end-->
        <a href="#myCarousel" class="left carousel-control" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only"> Previous </span>
        </a>

        <a href="#myCarousel" class="right carousel-control" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only"> Next </span>
        </a>
        
      </div><!--carousel-slide end-->

    </div><!--col-md-12 end-->






<!--divider section hotbox(latest this week) start-->
<div id="hotbox">
  <div class="box">
    <div class="container">
      <div class="col-md-12">
        <h2>Latest this week</h2>
      </div>
    </div>
  </div>
</div><!--divider section hotbox(latest this week) end-->

<!--home page products section start-->
<div id="content" class="container">
  <div class="row">
      <?php
      getPro();
      ?>
  </div>
  
</div> <!--home page products section end-->

<!--Footer start-->
<?php 
include("includes/footer.php");
?>
<!--Footer end-->

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>
</html>