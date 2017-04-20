<?php
    require_once ('functions.php');
    $f=new Functions();
    //$row = [];
    if(isset($_GET['id'])){
        $id = trim($_GET['id']);
        //echo $code;
        $str = "SELECT * FROM `notices` WHERE `id` = '".$id."' LIMIT 1";
        $notices = $f->selectQuery($str);
        //print_r($notice['code']);
    }
    else{
        //echo 'Visit Departments';
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Central Institute of Technology Kokrajhar">
    <meta name="author" content="Sanjib Narzary">


      <meta http-equiv="cache-control" content="max-age=0" />
      <meta http-equiv="cache-control" content="no-cache" />
      <meta http-equiv="expires" content="0" />
      <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
      <meta http-equiv="pragma" content="no-cache" />

    <link rel="icon" href="../../favicon.ico">

    <title><?php echo empty($notices['title'])?'Notices':$notices['title']; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/navbar-fixed-top.css" rel="stylesheet">
	<link href="assets/css/styles.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>
	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <?php
    include('inc/navbar-top.php');
  ?>
  <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
		<!--
			@author: Sanjib Narzary
			@email: san@cit.ac.in or narzary@iitg.ernet.in
			@program: CIT Kokrajhar Index Page
			@code-license: MIT or Free to use as long as CIT Feels it is useful.
			@copyright: All rights reserved by @author

		
		//-->


      <div class="well-lg" id="content">
		<div class="row" id="main-content">
            <div class="col-md-8 text-left">

                <?php
                    if(!isset($_GET['id'])){
                        ?>
                        <ul class="nav nav-tabs">
                            <li role="presentation" class="active"><a href="#">Notices</a></li>
                            <li role="presentation"><a href="#">News & Events</a></li>
                            <li role="presentation"><a href="#">Tenders</a></li>
                        </ul>
                        <br>
                <?php
                        echo '<ul class="list-unstyled">';
                        echo '';
                        $str = "SELECT * FROM `notices` WHERE 1 ORDER BY `created_at` DESC LIMIT 10";
                        $notices = $f->selectQueries($str);
                        foreach ($notices as $notice){
                            echo '<li><a href="notices.php?id='.$notice['id'].'">'.$notice['title'].'</a></li><br>';
                        }
                        echo '</ul>';
                    }
                ?>
                <div class="well-sm"><h1>
                    <?php
                        echo $notices['title'];
                    ?>
                    </h1>

                <?php
                    echo $notices['body'];
                ?>
                <?php
                    if(!empty($notices['file_path'])){
                        echo '<a class="btn btn-md btn-primary" href="/uploads/notices/'.$notices['file_path'].'">Download File</a>';
                    }
                ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="alert alert-info"><b>Notices</b></div>
                <ul class="text-left list-unstyled">
                    <?php
                    $str = "SELECT * FROM `notices` WHERE 1 ORDER BY `created_at` DESC LIMIT 10";
                    $notices = $f->selectQueries($str);
                    foreach ($notices as $notice){
                        echo '<li><i class="glyphicon glyphicon-bullhorn"></i> <a href="notices.php?id='.$notice['id'].'">'.$notice['title'].'</a></li>';
                    }
                    ?>
                </ul>
            </div>
		</div>
          <br>
          
      </div>
		
      <div class="center-block text-center" id="footer">
	  &copy; 19 April, 2017 - <?php echo date('d F, Y');?> Central Institute of Technology Kokrajhar
	  </div>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery-3.1.0.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
