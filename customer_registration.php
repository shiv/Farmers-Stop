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
            Registration
          </li>
        </ul>
      </div>
      <!--col-md-12 end-->
      <!--header section code end-->

      <!--spacing from left side-->
      <div class="col-md-2">

      </div>

      <!--Contact Us Header Start-->
      <div class="col-md-8">
        <!--col-md-9 start-->
        <div class="box">
          <!--Box start-->
          <div class="box-header">
            <!--Box-header start-->
            <center>
              <h2>Customer Registration</h2>
            </center>
          </div>
          <!--Box-header end-->
          <div>
            <form action="customer_registration.php" method="post" enctype="multipart/form-data">

              <div class="form-group">
                <label>Customer Name</label>
                <input type="text" name="c_name" required="" class="form-control">
              </div>
              <div class="form-group">
                <label>Customer Email</label>
                <input type="text" name="c_email" required="" class="form-control">
              </div>
              <div class="form-group">
                <label>Customer Password</label>
                <input type="password" name="c_password" required="" class="form-control">
              </div>
              <div class="form-group">
                <label>Country</label>
                <input type="text" name="c_country" required="" class="form-control">
              </div>
              <div class="form-group">
                <label>City</label>
                <input type="text" name="c_city" required="" class="form-control">
              </div>
              <div class="form-group">
                <label>Contact No.</label>
                <input type="text" name="c_contact" required="" class="form-control">
              </div>
              <div class="form-group">
                <label>Address</label>
                <input type="text" name="c_address" required="" class="form-control">
              </div>
              <div class="form-group">
                <label>Image</label>
                <input type="file" name="c_image" class="form-control">
              </div>
              <div class="text-center">
                <button type="submit" name="submit" class="btn btn-primary">
                  <i class="fa fa-user-md"></i>Register</button>
              </div>
            </form>
          </div>
        </div>
        <!--Box end-->
      </div>
      <!--col-md-9 end-->
      <!--Contact Us Header end-->




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

<?php
if (isset($_POST['submit'])) {
  $c_name = $_POST['c_name'];
  $c_email = $_POST['c_email'];
  $c_password = $_POST['c_password'];
  $c_country = $_POST['c_country'];
  $c_city = $_POST['c_city'];
  $c_contact = $_POST['c_contact'];
  $c_address = $_POST['c_address'];
  $c_image = $_FILES['c_image']['name'];
  $c_tmp_image = $_FILES['c_image']['tmp_name'];/*temporary image of customer will save for admin*/

  move_uploaded_file($c_tmp_image, "customer/customer_images/$c_image");
  $insert_customer = "insert into customers (customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image,customer_ip) values('$c_name','$c_email','$c_password','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_ip')";
  $run_customer = mysqli_query($con, $insert_customer);
  $sel_cart = "select * from cart where ip_add='$c_ip'";
  $run_cart = mysqli_query($con, $sel_cart);
  $check_cart = mysqli_num_rows($run_cart);
  if ($check_cart > 0) {
    $_SESSION['customer_email'] = $c_email;
    echo "<script>alert('You have been registered successfully.')</script>";
    echo "<script>window.open('checkout.php', '_self')</script>";
  } else {
    $_SESSION['customer_email'] = $c_email;
    echo "<script>alert('You have been registered successfully.')</script>";
    echo "<script>window.open('index.php', '_self')</script>";
  }
}
?>