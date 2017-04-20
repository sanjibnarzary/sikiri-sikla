<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Central Institute of Technology (CIT), Kokrajhar is situated in Kokrajhar District of Bodoland Territorial Council (BTC) in Assam. CIT has been established for the basic objective of fulfilling the aspirations of the Bodo People relating to their cultural identity, language, education and overall economic development of the region and to impart Bodo youths with requisite technological and vocational training to produce the required manpower to give the impetus to economic growth of this area and to integrate the Bodo People into the mainstream of Technical and Vocational Education. It is a Centrally Funded Institute under the Ministry of Human Resource Development, Government of India. The Institute was established on the 19th of December 2006. The genesis of this Institute was the memorandum of Settlement on Bodoland Territorial Council (BTC) signed between the Assam Government, the Union Government and the Bodo Liberation Tigers, on February 10, 2003, in New Delhi. The Institute is an autonomous body registered under the Societies Registration Act., 1860 and functions under a Board of Governors (BOG). CIT is mandated to impart Technical and Vocational Education such as Information Technology, Bio-Technology, Food Processing, Rural Industries, Business Management, etc. as part of the concerted efforts being made by the Government of India and the Government of Assam to fulfill the aspirations of the Bodo people. It is thus envisioned to acquire a unique place in the field of technical education in the country through its modular and innovative academic programmes. The first batch of students was admitted in Diploma Module in 2006. Currently CIT offers Diploma courses in Computer Science Engineering (CSE), Control and Instrumentation (CAI), Electronics and Communication Engineering (ECE) and Food Processing Technology (FPT), Construction Technology and Animation and Multimedia. The degree programme was started in CIT in 2009. At present the degree programmes offered by CIT are in Computer Science and Engineering, Electronics and Communication Engineering, Instrumentation Engineering, Food Processing Technology, Civil Engineering(Construction Technology) and Information Technology.">
    <meta name="author" content="Sanjib Narzary">
    <link rel="icon" href="../../favicon.ico">

    <title>Central Institute of Technology Kokrajhar</title>

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
			@program: CIT Kokrajhar Web Page
			@code-license: MIT or Free to use as long as CIT Feels it is useful.
			@copyright: All rights reserved by @author
			@dept: Computer Science & Engineering
            Options Indexes FollowSymLinks
        AllowOverride All
        <IfVersion < 2.3 >
                Order allow,deny
                Allow from all
        </IfVersion>
        <IfVersion >= 2.3 >
                Require all granted
        </IfVersion>

		
		//-->


      <div class="well-lg text-center" id="content">
		<div class="row" id="main-content">
            <div class="col-md-8">
                <?php
                    include ('inc/main-slider.php');
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
          <br>
          <div class="row">
              <div class="col-md-8">
                  <ul class="nav nav-tabs">
                      <li role="presentation" class="active"><a href="#">Announcements</a></li>
                      <li role="presentation"><a href="#">News & Events</a></li>
                      <li role="presentation"><a href="#">Tenders</a></li>
                  </ul>
                  <br>
                  <div class="text-overflow">
                      <ul class="text-left list-unstyled">
                      <?php
                      $str = "SELECT * FROM `notices` WHERE `type`='notice' ORDER BY `created_at` DESC LIMIT 10";
                      $notices = $f->selectQueries($str);
                      foreach ($notices as $notice){
                          echo '<li><i class="glyphicon glyphicon-check"></i> <a href="notices.php?id='.$notice['id'].'">'.$notice['title'].'</a></li>';
                      }
                      ?>
                      </ul>
                  </div>
              </div>
              <div class="col-md-4"></div>
          </div>
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
