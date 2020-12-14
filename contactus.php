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
            Contact Us
          </li>
        </ul>
      </div>
      <!--col-md-12 end-->

      <!--spacing from left side-->
      <div class="col-md-2">

      </div>

      <!--Contact Us Header Start-->
      <div class="col-lg-8">
        <!--col-md-9 start-->
        <div class="box">
          <!--Box start-->
          <div class="box-header">
            <!--Box-header start-->
            <center>
              <h2>Contact Us</h2>
              <p class="text-muted">If you have any questions, Please feel free to contact us, our customer service center is working for you 24/7.</p>
            </center>
          </div>
          <!--Box-header end-->
          <div>
            <form action="contactus.php" method="post">
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" required="" class="form-control">
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" required="" class="form-control">
              </div>
              <div class="form-group">
                <label>Subject</label>
                <input type="text" name="submit" required="" class="form-control">
              </div>
              <div class="form-group">
                <label>Message</label>
                <textarea class="form-control" name="message"></textarea>
              </div>
              <div class="text-center">
                <button type="submit" name="submit" class="btn btn-primary">
                  <i class="fa fa-user-md"></i>Send Message</button>
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