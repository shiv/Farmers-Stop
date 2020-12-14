<div id="footer">
	<!--Footer section start-->
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-4">
				<!--col-md-3 col-sm-6 start-->
				<h4> Pages </h4>
				<ul>
					<li><a href="cart.php"> Shopping Cart</a></li>
					<li><a href="contactus.php"> Contact Us</a></li>
					<li><a href="shop.php"> Shop </a></li>
					<li><a href="checkout.php"> My Account</a></li>
				</ul>
				<hr>
				<h4>User Section</h4>
				<ul>
					<li><a href="checkout.php"> Login </a></li>
					<li><a href="customer_registration.php"> Register </a></li>
				</ul>
				<hr class="hidden-md hidden-lg hidden-sm">
			</div>
			<!--col-md-3 col-sm-6 end-->

			<div class="col-md-4 col-sm-4">
				<!--col-md-3 col-sm-6 start-->
				<h4>Top Product Categories</h4>
				<ul>
					<?php

					$get_p_cats = "select * from product_categories";
					$run_p_cats = mysqli_query($con, $get_p_cats);
					while ($row_p_cat = mysqli_fetch_array($run_p_cats)) {
						$p_cat_id = $row_p_cat['p_cat_id'];
						$p_cat_title = $row_p_cat['p_cat_title'];
						echo "<li><a href='shop.php?pro_cat_id=$p_cat_id'> $p_cat_title </a></li>";
					}
					?>
				</ul>
				<hr class="hidden-md hidden-lg">
			</div>
			<!--col-md-3 col-sm-6 end-->

			<!-- <div class="col-md-3 col-sm-6">  -->
			<!-- <h4> Where to find us? </h4>
				<p>
					<strong>hsrwebdesigning.ga</strong>
					<br>Karamchari Colony
					<br>Dewas
					<br>Madhya Pradesh
					<br>hsrwebdesigning@gmail.com
					<br>8770137760
				</p>
				<a href="contactus.php">Go to contact us page</a>
				<hr class="hidden-md hidden-lg">
			</div> col-md-3 col-sm-6 end -->

			<div class="col-md-4 col-sm-4">
				<!--col-md-3 col-sm-6 start-->
				<h4>Get the news</h4>
				<p class="text-muted">
					subscribe here for getting new products update.
				</p>
				<form action="" method="post">
					<div class="input-group">
						<input type="text" name="email" class="form-control">
						<span class="input-group-btn"> <input type="submit" class="btn btn-default" value="subscribe">
						</span>

					</div>
				</form>
				<hr>
				<h4>Stay In Touch</h4>
				<p class="social">
					<a href="www.facebook.com"><i class="fa fa-facebook"></i></a>
					<a href="www.instagram.com"><i class="fa fa-instagram"></i></a>
					<a href="www.googleplus.com"><i class="fa fa-google-plus"></i></a>
					<a href="www.twitter.com"><i class="fa fa-twitter"></i></a>
					<a href="www.gmail.com"><i class="fa fa-envelope"></i></a>
				</p>
			</div>
			<!--col-md-3 col-sm-6 end-->
		</div>
	</div>
</div>
<!--Footer section end-->

<div id="copyright">
	<div class="container">
		<div class="col-md-4 ">
			<p class="pull-left">
				Geetik Nimonkar
			</p>
		</div>
		<div class="container">
			<div class="col-md-4 ">
				<p class="pull-left">
					Shivam Gupta
				</p>
			</div>
			<div class="col-md-4 ">
				<p class="pull-left">
					Gaurang Verma
					</a>
				</p>

			</div>
		</div>

	</div>