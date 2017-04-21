<?php
    require_once ('functions.php');
    $f=new Functions();
    //$row = [];
    if(isset($_GET['p'])){
        $slug = $_GET['p'];
        //echo $code;
        $str = "SELECT * FROM `pages` WHERE `slug` = '".$slug."' LIMIT 1";
        $page = $f->selectQuery($str);
        //print_r($page['code']);
    }
    else{
        echo 'Visit Departments';
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

    <title><?php echo $page['title']?></title>
      <?php
        include ('inc/headers.php');
      ?>
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
            <div class="col-md-8 text-justify">
                <?php
                    echo $page['body'];
                ?>
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

      </div>
		
      <div class="center-block text-center" id="footer">
	  &copy; 19 April, 2017 - <?php echo date('d F, Y');?> Central Institute of Technology Kokrajhar
	  </div>
    </div> <!-- /container -->

  <?php
    include ('inc/scripts.php');
  ?>
  </body>
</html>
