<?php
    require_once ('functions.php');
    $f=new Functions();
    //$row = [];
    if(isset($_GET['id'])){
        $show = 1;
        $id = trim($_GET['id']);
        //echo $code;
        $str = "SELECT * FROM `notices` WHERE `id` = '".$id."' LIMIT 1";
        $notices = $f->selectQuery($str);
        //print_r($notice['code']);
    }elseif (isset($_GET['type'])){
        $show = 2;
        $notice_type=trim($_GET['type']);
        if($notice_type=='notice'){
            $show=3;
            $str = "SELECT * FROM `notices` WHERE `type` = '".$notice_type."' ORDER BY `created_at` DESC LIMIT 40";
            $notices = $f->selectQueries($str);
            //print_r($str.'<br><br>');
        }
        elseif ($notice_type =='event'){
            $show=4;
            $str = "SELECT * FROM `notices` WHERE `type` = '".$notice_type."' ORDER BY `created_at` DESC LIMIT 40";
            $notices = $f->selectQueries($str);
        }
        elseif ($notice_type=='tender'){
            $show=5;
            $str = "SELECT * FROM `notices` WHERE `type` = '".$notice_type."' ORDER BY `created_at` DESC LIMIT 40";
            $notices = $f->selectQueries($str);
        }
    }
    else{
        //echo 'Visit Departments';
        $str = "SELECT * FROM `notices` WHERE 1 ORDER BY `created_at` DESC LIMIT 40";
        $notices = $f->selectQueries($str);
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
            <div class="col-md-8 text-left">

                <?php
                    if(!isset($_GET['id'])){
                        ?>

                <?php

                            ?>

                            <ul class="nav nav-tabs">
                                <li role="presentation" class="<?php if($show==3) echo 'active';?>"><a href="/notices/type/notice">Notices</a></li>
                                <li role="presentation" class="<?php if($show==4) echo 'active';?>"><a href="/notices/type/event">News & Events</a></li>
                                <li role="presentation" class="<?php if($show==5) echo 'active';?>"><a href="/notices/type/tender">Tenders</a></li>
                            </ul>
                            <br>
                <?php
                        echo '<ul class="list-unstyled">';
                        //print_r($notices);
                            foreach ($notices as $notice){
                                //print_r();
                                echo '<li><a href="/notices/'.$notice['id'].'">'.$notice['title'].'</a>'.' <sub>published on '.date('l, F jS, Y',strtotime($notice['created_at'])).'</sub></li><br>';
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
                
            </div>
		</div>
          <br>

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
