<?php

if (!isset($_SESSION['admin_email'])) {

  echo "<script>window.open('login.php','_self')</script>";
} else {

?>

  <div class="row">
    <!-- 1 row Starts -->

    <div class="col-lg-12">
      <!-- col-lg-12 Starts -->

      <ol class="breadcrumb">
        <!-- breadcrumb Starts -->

        <li class="active">

          <i class="fa fa-dashboard"></i> Dashboard / Insert Slide

        </li>

      </ol><!-- breadcrumb Ends -->



    </div><!-- col-lg-12 Ends -->

  </div><!-- 1 row Ends -->

  <div class="row">
    <!-- 2 row Starts -->

    <div class="col-lg-12">
      <!-- col-lg-12 Starts -->

      <div class="panel panel-default">
        <!-- panel panel-default Starts -->

        <div class="panel-heading">
          <!-- panel-heading Starts -->

          <h3 class="panel-title">

            <i class="fa fa-money fa-fw"></i> Insert Slide

          </h3>

        </div><!-- panel-heading Ends -->

        <div class="panel-body">
          <!-- panel-body Starts -->

          <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
            <!-- form-horizontal Starts -->

            <div class="form-group">
              <!-- form-group Starts -->

              <label class="col-md-3 control-label">Slide Name:</label>

              <div class="col-md-6">

                <input type="text" name="slider_name" class="form-control">

              </div>

            </div><!-- form-group Ends -->

            <div class="form-group">
              <!-- form-group Starts -->

              <label class="col-md-3 control-label">Slide Image:</label>

              <div class="col-md-6">

                <input type="file" name="slider_image" class="form-control">

              </div>

            </div><!-- form-group Ends -->

            <div class="form-group">
              <!-- form-group Starts -->

              <label class="col-md-3 control-label"></label>

              <div class="col-md-6">

                <input type="submit" name="submit" value="Submit Now" class=" btn btn-primary form-control">

              </div>

            </div><!-- form-group Ends -->


          </form><!-- form-horizontal Ends -->

        </div><!-- panel-body Ends -->


      </div><!-- panel panel-default Ends -->

    </div><!-- col-lg-12 Ends -->


  </div><!-- 2 row Ends -->

  <?php

  if (isset($_POST['submit'])) {

    $slider_name = $_POST['slider_name'];

    $slider_image = $_FILES['slider_image']['name'];

    $temp_name = $_FILES['slider_image']['tmp_name'];

    $view_slides = "select * from slider";

    $view_run_slides = mysqli_query($con, $view_slides);

    $count = mysqli_num_rows($view_run_slides);

    if ($count < 5) {

      move_uploaded_file($temp_name, "slider_images/$slider_image");

      $insert_slide = "insert into slider (slider_name,slider_image) values ('$slider_name','$slider_image')";

      $run_slide = mysqli_query($con, $insert_slide);

      echo "<script>alert('New Slide Has Been Inserted')</script>";

      echo "<script>window.open('index.php?view_slider','_self')</script>";
    } else {

      echo "<script>alert('You have already inserted 4 slides')</script>";
    }
  }


  ?>



<?php } ?>