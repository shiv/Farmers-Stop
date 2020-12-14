<?php
session_start();
if (!isset($_SESSION['customer_email'])) {
  echo "<script>window.open('..//checkout.php','_self')</script>";
} else {

  include("includes/db.php");
  include("..//functions/functions.php");
  if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
  }
?>


  <!DOCTYPE html>
  <html>

  <head>
    <title>Farmer's One Stop</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="..//styles/style.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- font awesome -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


  </head>

  <body>

    <div id="top">
      <!--Top Bar Start-->
      <div class="container">
        <!--Container start-->
        <div class="col-md-6 offer">
          <!--col-md-6 offer start-->
          <a href="#" class="btn btn-success btn-sm">

            <?php
            if (!isset($_SESSION['customer_email'])) {
              echo "Welcome Guest";
            } else {
              echo "Welcome: " . $_SESSION['customer_email'] . "";
            }
            ?>

          </a>

          <a href="#">Shopping Cart Total Price: INR <?php totalPrice(); ?> , Total Items <?php item(); ?> </a>

        </div>
        <!--col-md-6 offer end-->
        <div class="col-md-6">
          <ul class="menu">
            <li>
              <a href="../customer_registration.php"> Register </a>
            </li>
            <li>
              <?php
              if (!isset($_SESSION['customer_email'])) {
                echo "<a href='checkout.php'>My Account</a>";
              } else {
                echo "<a href='my_account.php?my_order'>My Account</a>";
              }
              ?>
            </li>
            <li>
              <a href="../cart.php"> Go To Cart </a>
            </li>
            <li>
              <?php
              if (!isset($_SESSION['customer_email'])) {
                echo "<a href='checkout.php'> Login </a>";
              } else {
                echo "<a href='logout.php'> Logout </a>";
              }
              ?>
            </li>
          </ul>

        </div>

      </div>
      <!--Container end-->

    </div>
    <!--Top Bar end-->

    <div class="navbar navbar-default" id="navbar">
      <!--navbar navbar-default start-->
      <div class="container">
        <div class="navbar-header">
          <!--navbar-header start-->
          <a class="navbar-brand home" href="..//index.php">
            <img src="../images/logo.png" alt="FOS Store" id="logo-xs" class="hidden-xs img-responsive" width="105" height="60">
            <img src="../images/logo.png" alt="FOS Store" id="logo-xs" class="visible-xs img-responsive">
          </a>
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
            <span class="sr-only"> Toogle Navigation </span>
            <i class="fa fa-align-justify"> </i>
          </button>
          <button type="button" class="navbar-toggle" data-toogle="collapse" data-target="#search">
            <span class="sr-only"></span>
            <i class="fa fa-search"></i>
          </button>
        </div>
        <!--navbar-header end-->

        <div class="navbar-collapse collapse" id="navigation">
          <!--navbar-collapse collapse start-->
          <div class="padding-nav">
            <!--padding-nav start-->
            <ul class="nav navbar-nav navbar-left">

              <li>
                <a href="../index.php"> Home </a>
              </li>
              <li>
                <a href="../shop.php"> Shop </a>
              </li>
              <li class="active">
                <?php
                if (!isset($_SESSION['customer_email'])) {
                  echo "<a href='checkout.php'>My Account</a>";
                } else {
                  echo "<a href='my_account.php?my_order'>My Account</a>";
                }
                ?>
              </li>
              <li>
                <a href="../cart.php"> Shopping Cart </a>
              </li>
              <li>
                <a href="../about.php"> About Us </a>
              </li>
              <li>
                <a href="../contactus.php"> Contact Us </a>
              </li>

            </ul>
          </div>
          <!--padding-nav end-->

          <a href="..//cart.php" class="btn btn-primary navbar-btn right">
            <i class="fa fa-shopping-cart"></i>
            <span> <?php item(); ?> items In Cart</span>
          </a>

          <div class="navbar-collapse collapse right">
            <!--navbar-collapse collapse-right start-->
            <button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="#search">
              <span class="sr-only"> Toggle Search</span>
              <i class="fa fa-search"></i>
            </button>
          </div>
          <!--navbar-collapse collapse-right end-->

          <div class="collapse clearfix" id="search">
            <form class="navbar-form" method="get" action="result.php"></form>
            <div class="input-group">
              <input type="text" name="user_query" placeholder="Search" class="form-control" required="">

              <span class="input-group-btn"> <button type="submit" value="Search" name="search" class="btn btn-primary">
                  <i class="fa fa-search"></i>
                </button> </span>

            </div>
          </div>
        </div>
        <!--navbar-collapse collapse end-->
      </div>
    </div>
    <!--navbar navbar-default end-->

    <div id="content">
      <div class="container">
        <!--Container Start-->
        <div class="col-md-12">
          <!--col-md-12 Start-->
          <ul class="breadcrumb">
            <li><a href="home.php">Home</a></li>
            <li>
              My Account
            </li>
          </ul>
        </div>
        <!--col-md-12 end-->

        <div class="col-md-3">
          <!--col-md-3 start-->
          <?php
          include("includes/sidebar.php");
          ?>
        </div>
        <!--col-md-3 end-->

        <div class="col-md-9">
          <div class="box">
            <h1 align="center">Please confirm your payment</h1>
            <form action="confirm.php?update_id=<?php echo $order_id ?>" method="post" enctype="mutipart/form-data">

              <div class="form-group">
                <label>Invoice Number</label>
                <input type="text" class="form-control" name="invoice_number" required="">
              </div>

              <div class="form-group">
                <label>Amount</label>
                <input type="text" class="form-control" name="amount" required="">
              </div>

              <div class="form-group">
                <label>Select Payment Mode</label>
                <select class="form-control" name="payment_mode">
                  <option>Bank transfer</option>
                  <option>Paypal</option>
                  <option>PayuMoney</option>
                  <option>PayTm</option>
                </select>
              </div>

              <div class="form-group">
                <label>Transaction Number</label>
                <input type="text" class="form-control" name="trfr_number" required="">
              </div>

              <div class="form-group">
                <label>Payment Date</label>
                <input type="Date" class="form-control" name="date" required="">
              </div>

              <div class="text-center">
                <button type="submit" name="confirm_payment" class="btn btn-primary btn-lg">
                  Confirm Payment
                </button>
              </div>
            </form>
            <?php
            if (isset($_POST['confirm_payment'])) {
              $update_id = $_POST['update_id'];
              $invoice_number = $_POST['invoice_number'];
              $amount = $_POST['amount'];
              $payment_mode = $_POST['payment_mode'];
              $trfr_number = $_POST['trfr_number'];
              $date = $_POST['date'];
              $complete = "Complete";

              $insert = "insert into payments (invoice_id,amount,payment_mode,ref_no,payment_date) 
            values('$invoice_number','$amount','$payment_mode','$trfr_number','$date')";
              $run_insert = mysqli_query($con, $insert);

              $update_q = "update customer_order set order_status='$complete' where order_id='$update_id'";
              $run_update = mysqli_query($con, $update_q);

              //  $pending_order="update pending_order set order_status='$complete' where order_id='$update_id'";
              //   $run_pending=mysqli_query($con,$pending_order);

              echo "<script>alert('Your order has been received.') </script>";
              echo "<script>window.open('my_account.php?','_self') </script>";
            }
            ?>


          </div>
        </div>



















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

<?php } ?>