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


      <div class="well-lg" id="content">
		<div class="row" id="main-content">
            <div class="col-md-12">
                <?php
                    include ('inc/main-slider.php');
                ?>
            </div>
            <!--
            <div class="col-md-4 text-overflow">
                <div class="alert alert-info"><b>Notices</b></div>
                <ul class="text-left list-unstyled">
                    <?php
                    $str = "SELECT * FROM `notices` WHERE 1 ORDER BY `created_at` DESC LIMIT 10";
                    $notices = $f->selectQueries($str);
                    foreach ($notices as $notice){
                        echo '<li><i class="glyphicon glyphicon-bullhorn"></i> <a href="notices/'.$notice['id'].'">'.$notice['title'].'</a></li><br>';
                    }
                    ?>
                </ul>
            </div>
            //-->
		</div>
          <br>
          <div class="row">
              <div class="col-md-8">
                  <ul class="nav nav-tabs">
                      <li role="presentation" class="active"><a href="/notices/type/notice">Notices</a></li>
                      <li role="presentation" class="<?php if($show==4) echo 'active';?>"><a href="/notices/type/event">News & Events</a></li>
                      <li role="presentation" class="<?php if($show==5) echo 'active';?>"><a href="/notices/type/tender">Tenders</a></li>
                  </ul>
                  <br>
                  <div>
                      <ul class="text-left list-unstyled">
                          <?php
                          $str = "SELECT * FROM `notices` WHERE `type`='notice' ORDER BY `created_at` DESC LIMIT 10";
                          $notices = $f->selectQueries($str);
                          foreach ($notices as $notice){
                              echo '<li><i class="glyphicon glyphicon-check"></i> <a href="/notices/'.$notice['id'].'">'.$notice['title'].'</a></li>';
                          }
                          ?>
                      </ul>
                  </div>


              </div>
              <div class="col-md-4"></div>
          </div>
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
