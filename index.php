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

  <!--header section code start-->
  <?php
  include("includes/header.php");
  ?>
  <!--header section code end-->


  </div>
  <!--container end-->

  <div id="slider">
    <!-- class="container" container start-->
    <div class="col-lg-12">
      <!--col-md-12 start-->
      <div class="carousel slide" id="myCarousel" data-ride="carousel">
        <!--carousel-slide start-->
        <ol class="carousel-indicators">
          <li data-target="myCarousel" data-slide-to="0" class="action"></li>
          <li data-target="myCarousel" data-slide-to="1"></li>
          <li data-target="myCarousel" data-slide-to="2"></li>
          <li data-target="myCarousel" data-slide-to="3"></li>
        </ol>

        <div class="carousel-inner">
          <!--carousel-inner start-->

          <?php
          $get_slider = "select * from slider LIMIT 0,1";
          $run_slider = mysqli_query($con, $get_slider);
          while ($row = mysqli_fetch_array($run_slider)) {
            $slider_name = $row['slider_name'];
            $slider_image = $row['slider_image'];
            echo "<div class='item active'>
                  <img src='admin_area/slider_images/$slider_image'>
              </div> ";
          }
          ?>

          <?php
          $get_slider = "select * from slider LIMIT 1,3";
          $run_slider = mysqli_query($con, $get_slider);
          while ($row = mysqli_fetch_array($run_slider)) {
            $slider_name = $row['slider_name'];
            $slider_image = $row['slider_image'];
            echo "<div class= 'item'>
                  <img src= 'admin_area/slider_images/$slider_image'>
              </div>";
          }
          ?>

        </div>
        <!--carousel-inner end-->
        <a href="#myCarousel" class="left carousel-control" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only"> Previous </span>
        </a>

        <a href="#myCarousel" class="right carousel-control" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only"> Next </span>
        </a>

      </div>
      <!--carousel-slide end-->

    </div>
    <!--col-md-12 end-->






    <!--divider section hotbox(latest this week) start-->
    <div id="hotbox">
      <div class="box">
        <div class="container">
          <div class="col-md-12">
            <h2>Latest this week</h2>
          </div>
        </div>
      </div>
    </div>
    <!--divider section hotbox(latest this week) end-->

    <!--home page products section start-->
    <div id="content" class="container">
      <div class="row">
        <?php
        getPro();
        ?>
      </div>

    </div>
    <!--home page products section end-->

    <!--Footer start-->
    <?php
    include("includes/footer.php");
    ?>
    <!--Footer end-->

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>

</html>