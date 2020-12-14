<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
?>

<!DOCTYPE html>
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
            Cart
          </li>
        </ul>
      </div>
      <!--col-md-12 end-->

      <div class="col-md-9" id="cart">
        <!--col-md-9 start-->
        <div class="box">

          <form action="cart.php" method="post" enctype="multipart-form-data">
            <h1>Shopping Cart</h1>

            <?php
            $ip_add = getUserIP();
            $select_cart = "select * from cart where ip_add='$ip_add'";
            $run_cart = mysqli_query($con, $select_cart);
            $count = mysqli_num_rows($run_cart);




            ?>

            <p class="text-muted"> Currently you have <?php echo $count; ?> items in your cart</p>
            <div class="table-responsive">
              <!--table-responsive start-->
              <table class="table">
                <thead>
                  <tr>
                    <th colspan="2">Product</th>
                    <th>Ouantity</th>
                    <th>Unit Price</th>
                    <th>Size</th>
                    <th colspan="1">Delete</th>
                    <th colspan="1">Sub Total</th>

                  </tr>
                </thead>
                <tbody>
                  <?php
                  $total = 0;
                  while ($row = mysqli_fetch_array($run_cart)) {
                    $pro_id = $row['p_id'];
                    $pro_size = $row['size'];
                    $pro_qty = $row['qty'];

                    $get_product = "select * from products where product_id='$pro_id'";
                    $run_product = mysqli_query($con, $get_product);
                    while ($row = mysqli_fetch_array($run_product)) {
                      $p_title = $row['product_title'];
                      $p_img1 = $row['product_img1'];
                      $p_price = $row['product_price'];
                      $sub_total = $row['product_price'] * $pro_qty;
                      $total += $sub_total; // or $total = $total + $sub_total;



                  ?>

                      <tr>
                        <td><img src="admin_area/product_images/<?php echo $p_img1; ?>"></td>
                        <td> <?php echo $p_title; ?> </td>
                        <td> <?php echo $pro_qty; ?> </td>
                        <td> <?php echo $p_price; ?> </td>
                        <td> <?php echo $pro_size; ?> </td>
                        <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"></td>
                        <td> <?php echo $sub_total; ?> </td>
                      </tr>

                  <?php  }
                  } ?>

                  </tfoot>
              </table>
            </div>
            <!--table-responsive end-->

            <div class="box-footer">
              <div class="pull-left">
                <!--pull-left start-->
                <h4> Total Price</h4>

              </div>

              <div class="pull-right">
                <h4>INR <?php echo $total; ?> </h4>

              </div>
            </div>



            <div class="box-footer">
              <div class="pull-left">
                <!--pull-left start-->
                <a href="index.php" class="btn btn-default">
                  <i class="fa fa-chevron-left"></i>Continue Shopping
                </a>

              </div>
              <!--pull-left end-->
              <div class="pull-right">
                <button class="btn btn-default" type="submit" name="update" value="Update Cart">
                  <i class="fa fa-refresh">Update Cart</i>
                </button>

                <a href="checkout.php" class="btn btn-primary">
                  Proceed to checkout<i class="fa fa-chevron-right"></i>
                </a>

              </div>
            </div>
          </form>
        </div>
        <?php
        function update_cart()
        {
          global $con;
          if (isset($_POST['update'])) {
            foreach ($_POST['remove'] as $remove_id) {
              $delete_product = "delete from cart where p_id='$remove_id'";
              $run_del = mysqli_query($con, $delete_product);
              if ($run_del) {
                echo "<script>window.open('cart.php','_self')</script>";
              }
            }
          }
        }
        echo @$up_cart = update_cart();
        ?>

        <!--you also like these products section code start-->
        <div id="row same-height-row">
          <!--row same-height-row start-->
          <div class="col-md-3 col-sm-6">
            <!--col-md-3 col-sm-6 start-->
            <div class="box same-height-headline">
              <!--box same-height-headline start-->
              <h3 class="text-center"> You Would Also Like These Products </h3>
            </div>
            <!--box same-height-headline end-->
          </div>
          <!--col-md-3 col-sm-6 end-->

          <?php
          $get_product = "select * from products order by RAND() LIMIT 0,3";
          $run_product = mysqli_query($con, $get_product);
          while ($row = mysqli_fetch_array($run_product)) {
            $pro_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_price = $row['product_price'];
            $product_img1 = $row['product_img1'];
            echo "
      <div class='center-responsive col-md-3 col-sm-6' >
      <div class='product same-height'>
        <a href='details.php?pro_id=$pro_id'>
          <img src='admin_area/product_images/$product_img1' class='img-responsive'>
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

        </div>
        <!--row same-height-row end-->
        <!--Cart page - you also like these products section code end-->

      </div>
      <!--col-md-9 end-->

      <!--Order Summary section code Start-->
      <div class="col-md-3">
        <!--col-md-3 start-->
        <div class="box" id="order-summary">
          <div class="box-header">
            <h3>Order Summary</h3>
            <p class="text-muted">
              Shipping and additional costs are calculated based on the value you have entered.
            </p>
            <div class="table-responsive">
              <table class="table">
                <tbody>
                  <tr>
                    <td>Order Sub-total</td>
                    <td><?php echo $total; ?></td>
                  </tr>
                  <tr>
                    <td>Shipping and handling</td>
                    <td>INR 0</td>
                  </tr>
                  <tr>
                    <td>Tax</td>
                    <td>INR 0</td>
                  </tr>
                  <tr class="total">
                    <td>Total</td>
                    <th><?php echo $total; ?></th>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

        </div>

      </div>
      <!--col-md-3 end-->
      <!--Order Summary section code End-->









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