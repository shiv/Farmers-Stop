<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
?>

<?php
if(isset($_GET['pro_id'])){
    $pro_id=$_GET['pro_id'];
    $get_product="select * from products where product_id='$pro_id'";
    $run_product=mysqli_query($con,$get_product);
    $row_product=mysqli_fetch_array($run_product);
    $p_cat_id=$row_product['p_cat_id'];
    $p_title=$row_product['product_title'];
    $p_price=$row_product['product_price'];
    $p_desc=$row_product['product_desc'];
    $p_img1=$row_product['product_img1'];
    $p_img2=$row_product['product_img2'];
    $p_img3=$row_product['product_img3'];

    $get_p_cat="select * from product_categories where p_cat_id='$p_cat_id'";
    $run_p_cat=mysqli_query($con,$get_p_cat);
    $row_p_cat=mysqli_fetch_array($run_p_cat);
    $pro_cat_id=$row_p_cat['p_cat_id'];
    $pro_cat_title=$row_p_cat['p_cat_title'];
}
?>

<html>
<head>
	<title>Farmer's One Stop</title>
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

            			<li >
            				<a href="index.php"> Home </a>
            			</li>
            			<li class="active">
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

<div id="content">
  <div> <!-- class="container"Container Start-->
    <div class="col-md-12"> <!--col-md-12 Start-->
      <ul class="breadcrumb">
        <li><a href="home.php">Home</a></li>
        <li><a href="shop.php">Shop</a></li>
        
          

        <li><a href="shop.php?pro_cat_id=<?php echo $pro_cat_id; ?>"><?php echo $pro_cat_title ?></a>  </li>

        <li><?php echo $p_title?></li>
      </ul>
    </div><!--col-md-12 end-->

<div class="col-md-12"> <!--col-md-9 start-->
  <div class="row" id="productmain">
    <div class="col-sm-6"> <!--col-sm-6 slider start-->
      <div id="mainimage">
        <div id="mycarousel" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
            <li data-target="#mycarousel" data-slide-to="1" ></li>
            <li data-target="#mycarousel" data-slide-to="2" ></li>
          </ol>
          <div class="carousel-inner"> <!--carousel inner Start-->
            
            <div class="item active">
              <center>
                <img src="admin_area/product_images/<?php echo $p_img1 ?>" class="img-responsive">
              </center>
            </div>
            
            <div class="item">
              <center>
                <img src="admin_area/product_images/<?php echo $p_img2 ?>" class="img-responsive">
              </center>            
            </div>

            <div class="item">
              <center>
                <img src="admin_area/product_images/<?php echo $p_img3 ?>" class="img-responsive">
              </center>            
            </div>

          </div> <!--carousel inner end-->

          <a href="#mycarousel" class="left carousel-control" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
          </a>

          <a href="#mycarousel" class="right carousel-control" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
          </a>
    
          </div>
        </div>
    </div>   <!--col-sm-6 slider end-->
     
    
    <div class="col-sm-6"> <!--col-sm-6 start-->
      <div class="box"> <!--box start--> 
        <h1 class="text-center"> <?php echo $p_title; ?> </h1>
      
        <?php
        addCart();
        ?>  

        <form action="details.php?add_cart=<?php echo $pro_id ?>" method="post" class="form-horizontal">
        <div class="form-group"> <!--form-group start-->

          <label class="col-md-5 control-label">  Product Quantity (in KG)</label>
          <div class="col-md-7"> <!--col-md-7 start-->

            <select name="product_qty" class="form-control">
              <option>1</option>
              <option>2</option>
              <option>5</option>
              
            </select>
            
          </div> <!--col-md-7 end-->
            
        </div> <!--form-group end-->

        <div class="form-group"><!--form-group start-->
          <!-- <label class="col-md-5 control-label"> Product Size </label>
          <div class="col-md-7">
            <select name="product_size" class="form-control">
              <option>Select a size</option>
              <option>Small</option>
              <option>Medium</option>
              <option>Large</option>
              <option>Extra-Large</option>
            </select>
          </div> -->
        </div>
        <p class="price"> INR <?php echo $p_price ?> Per KG </p>
        <p class="text-center buttons">
          <button class="btn btn-primary" type="submit">
            <i class="fa fa-shopping-cart"></i> Add to carts
          </button>
          <button class="btn" type="buy">
            <i class="fa fa-shopping-cart"></i> Buy Now </a>
          </button>
         </p>
        </form> <!--form-group end-->

      </div> <!--box end--> 

      <div class="col-xs-4">
        <a href="#" class="thumb"> 
            <img src="admin_area/product_images/<?php echo $p_img1 ?>" class="img-responsive">
        </a>
      </div>

      <div class="col-xs-4">
        <a href="#" class="thumb"> 
            <img src="admin_area/product_images/<?php echo $p_img2 ?>" class="img-responsive">
        </a>
      </div>

      <div class="col-xs-4">
        <a href="#"  class="thumb" > 
            <img src="admin_area/product_images/<?php echo $p_img3 ?>" class="img-responsive">
        </a>
      </div>

    </div> <!--col-sm-6 end-->
  </div>
  
  <div class="box" id="details">
    <h4>Product Details</h4>
    <p> <?php echo $p_desc ?> </p>
  </div>

  <div id="row same-height-row"><!--row same-height-row start-->
    <div class="col-md-3 col-sm-6"> <!--col-md-3 col-sm-6 start-->
      <div class="box same-height-headline"> <!--box same-height-headline start-->
        <h3 class="text-center"> You Also Like These Products</h3>
      </div><!--box same-height-headline end-->
    </div><!--col-md-3 col-sm-6 end-->

    <?php
    $get_product="select * from products order by rand() LIMIT 0,4";
    $run_product=mysqli_query($con,$get_product);
    while ($row=mysqli_fetch_array($run_product)) {
      $pro_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_price=$row['product_price'];
      $product_img1=$row['product_img1'];
      echo "
      <div class='center-responsive col-md-2 col-sm-6' >
      <div class='product same-height'>
        <a href='details.php?pro_id=$pro_id'>
          <img src='admin_area/product_images/$product_img1' class='img-responsive' height='200' width='200'>
        </a>
        <div class='text'>
          <h3><a href='details.php?pro_id=$pro_id'> $product_title </a></h3>
          <p class='price'>INR $product_price</p>
        </div>
      </div>
      </div>
      ";

    }

    ?>
    
  </div><!--row same-height-row end-->
</div><!--col-md-9 end-->
<div>

</div> <!--Container end-->
</div> <!--content end-->

<div class="container"></div><!-- for seperating footer background color from shop background color -->


<!--Footer start-->
<?php 
include("includes/footer.php");
?>
<!--Footer end-->

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>
</html>

