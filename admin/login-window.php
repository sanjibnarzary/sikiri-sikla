<?php
  @session_start();
  if(isset($_SESSION['email'])){
    header('Location: registration-edit.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Admin Login</title>
    <?php
        include_once ('../inc/headers.php');
    ?>
  </head>

  <body>

  <?php
    include('inc/navbar-top.php');
  ?>
  <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
     <!--
      <img src="assets/img/banner.jpg" class="img-responsive img-rounded"/>
//-->

      <div class="row">
        <div class="col-md-3">
          </div>
        <div class="col-md-6">
          <h2 class="text-center text-primary">Admin User (Login Here)</h2><br>
          <div class="well-lg col-md-12">
            <?php
              if(isset($_GET['error'])){
              ?>
                <div class="alert alert-danger alert-dismissable">
                  <b>Something went wrong in login process<br> Make sure to provide the correct credentials!</b>
                </div>
            <?php
              }
            ?>
            <form class="form" method="post" action="loginProcess.php">
              <div class="col-md-12">
                <label>Email </label> <span class="text-success">(Must be same with the email you have registered)</span>
                <input type="text" name="username" class="form-control" placeholder="Username">
              </div>
              <div class="col-md-12"><br>
                <label>Phone </label> <span class="text-success">(Must be same with the Phone number you have registered)</span>
                <input type="password" name="password" class="form-control" placeholder="************">
              </div>
              <div class="col-md-12"><br>

                <input type="submit" class="btn btn-block btn-primary btn-md"
                        class="form-control" value="Log me In">
              </div>

            </form>

            <div class="col-md-12">
              <br>
             <!--  <a class="btn btn-block btn-info text-center" href="registration-new.php">New User Registered Here</a> //-->
            </div>
          </div>
        </div>
        <div class="col-md-3">
        </div>
      </div>


      <div class="center-block text-center">&copy; ICOLSI-2016, CLST, IIT Guwahati</div>
    </div> <!-- /container -->


    <?php
        include_once ('../inc/scripts.php');
    ?>
  </body>
</html>
