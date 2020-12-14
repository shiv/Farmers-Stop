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
          <a href="customer_registration.php"> Register </a>
        </li>
        <li>
          <?php
          if (!isset($_SESSION['customer_email'])) {
            echo "<a href='checkout.php'>My Account</a>";
          } else {
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
      <a class="navbar-brand home" href="index.php">
        <img src="images/logo.png" alt="FOS Store" id="logo-xs" class="hidden-xs img-responsive" width="105" height="60">
        <img src="images/logo.png" alt="FOS Store" id="logo-xs" class="visible-xs img-responsive">
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
            <a href="index.php"> Home </a>
          </li>
          <li>
            <a href="shop.php"> Shop </a>
          </li>
          <li>
            <?php
            if (!isset($_SESSION['customer_email'])) {
              echo "<a href='checkout.php'>My Account</a>";
            } else {
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
      </div>
      <!--padding-nav end-->

      <a href="cart.php" class="btn btn-primary navbar-btn right">
        <i class="fa fa-shopping-cart"></i>
        <span><?php item(); ?> items In Cart</span>
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