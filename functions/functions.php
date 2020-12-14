<?php
$db = mysqli_connect("localhost", "root", "", "ecom", "3306");/*parameter(hostname) , username, password, database-name, port */

//For getting user ip start
function getUserIP()
{
	switch (true) {
		case (!empty($_SERVER['HTTP_X_REAL_IP'])):
			return $_SERVER['HTTP_X_REAL_IP'];
		case (!empty($_SERVER['HTTP_CLIENT_IP'])):
			return $_SERVER['HTTP_CLIENT_IP'];
		case (!empty($_SERVER['HTTP__X_FORWARDED_FOR'])):
			return $_SERVER['HTTP__X_FORWARDED_FOR'];
		default:
			return $_SERVER['REMOTE_ADDR'];
	}
}
//For getting user ip end

//For adding products to database table "cart"
function addCart()
{
	global $db;
	if (isset($_GET['add_cart'])) {
		$ip_add = getUserIP();
		$p_id = $_GET['add_cart'];
		$product_qty = $_POST['product_qty'];
		$product_size = $_POST['product_size'];
		$check_product = "select * from cart where ip_add='$ip_add' AND p_id='$p_id'";
		$run_check = mysqli_query($db, $check_product);

		if (mysqli_num_rows($run_check) > 0) {
			echo "<script> alert('This product is already in cart') </script>";
			echo "<script> window.open('details.php?pro_id=$p_id' , '_self' )</script>";/*pro_id means that database from "products" table product_id and p_id is from "cart" table */
		} else {
			$query = "insert into cart(p_id,ip_add,qty,size) values('$p_id','$ip_add','$product_qty','$product_size')";
			$run_query = mysqli_query($db, $query);
			echo "<script> window.open('details.php?pro_id=$p_id' , '_self') </script>";
		}
	}
}

//items count start
function item()
{
	global $db;
	$ip_add = getUserIP();
	$get_items = "select * from cart where ip_add='$ip_add'";
	$run_item = mysqli_query($db, $get_items);
	$count = mysqli_num_rows($run_item);
	echo $count;
} //items count end

//total price start
function totalPrice()
{
	global $db;
	$ip_add = getUserIP();
	$total = 0;
	$select_cart = "select * from cart where ip_add='$ip_add'";
	$run_cart = mysqli_query($db, $select_cart);
	while ($record = mysqli_fetch_array($run_cart)) {
		$pro_id = $record['p_id'];
		$pro_qty = $record['qty'];
		$get_price = "select * from products where product_id='$pro_id'";
		$run_price = mysqli_query($db, $get_price);
		while ($row_price = mysqli_fetch_array($run_price)) {
			$sub_total = $row_price['product_price'] * $pro_qty;
			$total += $sub_total;
		}
	}
	echo $total;
}
//total price end

/********************************************************************************************/
/*Products (which is in the index.php)*/
function getPro()
{
	global $db;
	$get_product = "select * from products order by RAND() DESC LIMIT 0,8";
	$run_products = mysqli_query($db, $get_product);
	while ($row_product = mysqli_fetch_array($run_products)) {
		$pro_id = $row_product['product_id'];
		$pro_title = $row_product['product_title'];/*long product title*/
		$pro_title_short = substr($pro_title, 0, 30) . '...';/*short product title*/
		$pro_price = $row_product['product_price'];
		$pro_img1 = $row_product['product_img1'];

		echo "
		<style> 
		.col-md-3{display:inline-block ;float:unset; width:24%;}
		</style>	
		
		<div class='col-md-3 col-sm-6'> 
		 <div class='product'>
		 <a href='details.php?pro_id=$pro_id'>
		 <img src= 'admin_area/product_images/$pro_img1' class='img-responsive'>
		 </a>
		 
		 <div class='text'>
		 <h3><a href='details.php?pro_id=$pro_id'> $pro_title_short </a></h3>
		 <p class='price'> INR $pro_price / KG</p>
		 <p class='buttons'> 
		 <a href='details.php?pro_id=$pro_id' class='btn btn-default'> View Details </a> 
		 <a href='details.php?pro_id=$pro_id' class='btn btn-primary'> <i class='fa fa-shopping-cart'> </i> Add to cart  </a>
		 </p>
		 </div>
		 </div>
	 </div>";
	}
}
/********************************************************************************************/

/*Product Categories (which is in sidebar)*/
function getPro_cats()
{
	global $db;
	$get_pro_cat = "select * from product_categories";
	$run_pro_cat = mysqli_query($db, $get_pro_cat);
	while ($row_pro_cat = mysqli_fetch_array($run_pro_cat)) {
		$pro_cat_id = $row_pro_cat['p_cat_id'];
		$pro_cat_title = $row_pro_cat['p_cat_title'];

		echo "<li><a href='shop.php?pro_cat_id=$pro_cat_id'> $pro_cat_title </a></li>";
	}
}
/********************************************************************************************/

/*Categories (which is in sidebar) */
function getCats()
{
	global $db;
	$get_cats = "select * from categories";
	$run_cats = mysqli_query($db, $get_cats);
	while ($row_cats = mysqli_fetch_array($run_cats)) {
		$cat_id = $row_cats['cat_id'];
		$cat_title = $row_cats['cat_title'];

		//echo "<li><a href='shop.php?cat_id=$cat_id'> $cat_title </a></li>";
	}
}
/********************************************************************************************/

/*Get Product-Categories items */
function getPcatPro()
{
	global $db;
	if (isset($_GET['pro_cat_id'])) {
		$pro_cat_id = $_GET['pro_cat_id'];
		$get_p_cat = "select * from product_categories where p_cat_id='$pro_cat_id'";
		$run_p_cat = mysqli_query($db, $get_p_cat);
		$row_p_cat = mysqli_fetch_array($run_p_cat);
		$p_cat_title = $row_p_cat['p_cat_title'];
		$p_cat_desc = $row_p_cat['p_cat_desc'];

		$get_products = "select * from products where p_cat_id='$pro_cat_id' order by 1 DESC";
		$run_products = mysqli_query($db, $get_products);
		$count = mysqli_num_rows($run_products);

		if ($count == 0) {
			echo "<div class='box'>
			<h1>No Product Found In this Product Category.</h1>
			</div>";
		} else {
			echo "
			<div class='box'>
			<h1> $p_cat_title </h1>
			<p> $p_cat_desc </p>
			</div>
			";
		}

		while ($row_products = mysqli_fetch_array($run_products)) {
			$pro_id = $row_products['product_id'];
			$pro_title = $row_products['product_title'];/*full product title*/
			$pro_title_short = substr($pro_title, 0, 40) . '...';/*short product title*/
			$pro_img1 = $row_products['product_img1'];
			$pro_price = $row_products['product_price'];

			echo "
			<style> 
			.productCard{display:inline-block ;float:unset; width:24%;}
			</style>	
			<div class='col-lg-3 col-md-2 col-sm-6 productCard' center-responsive > 
				<div class='product'>
					<a href='details.php?pro_id=$pro_id'>
					<img src='admin_area/product_images/$pro_img1' class='img-responsive'>
					</a>

					<div class='text' >
						<h3><a href='details.php?pro_id=$pro_id'> $pro_title_short </a></h3>
						<p class='price'> INR $pro_price / KG</p>
						
						
						</p>
					</div>
				</div>
			</div>
			";
		}
	}
}

/********************************************************************************************/

/*Get Categories items*/
function getCatPro()
{
	global $db;
	if (isset($_GET['cat_id'])) {
		$cat_id = $_GET['cat_id'];
		$get_cat = "select * from categories where cat_id='$cat_id'";
		$run_cats = mysqli_query($db, $get_cat);
		$row_cats = mysqli_fetch_array($run_cats);
		$cat_title = $row_cats['cat_title'];
		$cat_desc = $row_cats['cat_desc'];

		$get_products = "select * from products where cat_id='$cat_id'";
		$run_products = mysqli_query($db, $get_products);
		$count = mysqli_num_rows($run_products);


		if ($count == 0) {
			echo "<div class='box'>
			<h1>No Product Found In this Category.</h1>
			</div>";
		} else {
			echo "
			<div class='box'>
			<h1> $cat_title </h1>
			<p> $cat_desc </p>
			</div>
			";
		}


		while ($row_products = mysqli_fetch_array($run_products)) {
			$pro_id = $row_products['product_id'];
			$pro_title = $row_products['product_title'];/*long product title*/
			$pro_title_short = substr($pro_title, 0, 40) . '...';/*short product title*/
			$pro_img1 = $row_products['product_img1'];
			$pro_price = $row_products['product_price'];

			echo "
			<div class='col-lg-3 col-md-3 col-sm-6' center-responsive > 
				<div class='product'>
					<a href='details.php?pro_id=$pro_id'>
					<img src='admin_area/product_images/$pro_img1' class='img-responsive'>
					</a>

					<div class='text'>
						<h3><a href='details.php?pro_id'>$pro_title_short</a></h3>
						<p class='price'> INR $pro_price </p>
						<p class='buttons'>
						<a href='details.php?pro_id=$pro_id' class='btn btn-default'> View Details </a>
						<a href='details.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i> Add To Cart</a>
						</p>
					</div>
				</div>
			</div>
			";
		}
	}
}
