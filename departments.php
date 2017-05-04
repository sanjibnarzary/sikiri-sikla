<?php
    require_once ('functions.php');
    $f=new Functions();
    //$row = [];
    if(isset($_GET['code'])){
        $code = trim($_GET['code']);
        //echo $code;
        $str = "SELECT * FROM `departments` WHERE `code` = '".$code."' LIMIT 1";
        $depts = $f->selectQuery($str);
        //print_r($dept['code']);
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

    <title><?php echo $depts['title']?></title>

    <?php
        include ('inc/headers.php');
    ?>
  </head>

  <body>

  <?php
    include_once ('inc/ascitext-author.php');
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
                    echo $depts['body'];
                ?>
            </div>
            <div class="col-md-4">
                <div class="alert alert-info"><b>Navigation</b></div>
                <div>
                    <ul class="list-unstyled">
                        <li class=""><a href="/department/<?php echo $depts['code'];?>">About</a></li>
                        <li class=""><a href="/department/<?php echo $depts['code'];?>/people">Faculties &amp;Staffs</a></li>
                        <li class=""><a href="#">Facilities</a></li>

                    </ul>
                </div>
            </div>
		</div>
          <br>
          <!--
          <div class="row">
              <div class="col-md-8">
                  <ul class="nav nav-tabs">
                      <li role="presentation" class="active"><a href="#">Announcements</a></li>
                      <li role="presentation"><a href="#">News & Events</a></li>
                      <li role="presentation"><a href="#">Tenders</a></li>
                  </ul>
                  <br>
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
              <div class="col-md-4"></div>
          </div>
          //-->
      </div>

      <div>

          <?php
          include_once ('inc/footer-info.php');
          ?>

      </div>
    </div> <!-- /container -->


  <?php
    include ('inc/scripts.php');
  ?>
  </body>
</html>
