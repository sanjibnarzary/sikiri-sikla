<?php
    require_once ('functions.php');
    $f=new Functions();
    //$row = [];
    $people = [];
    $dept=[];
    $show = 0;
    if(isset($_GET['code'])){
        $code = trim($_GET['code']);
        $str = "SELECT * FROM `departments` WHERE `code` = '".$code."' LIMIT 1";
        $dept = $f->selectQuery($str);
    }

    if(isset($_GET['code'])&&!isset($_GET['id'])){
        $code = trim($_GET['code']);
        //echo $code;
        $str = "SELECT * FROM `tpeople` WHERE `code` = '".$code."'";
        $peoples = $f->selectQueries($str);
        //print_r($peoples);
        $show = 1;
    }elseif (isset($_GET['code'])&&isset($_GET['id'])){
        $code = trim($_GET['code']);
        $id = trim($_GET['id']);
        $str = "SELECT * FROM `tpeople` WHERE `code` = '".$code."' AND `EmpID`='".$id."'";
        $people = $f->selectQuery($str);
        //print_r($peoples);
        $show = 2;
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

    <title><?php echo empty($people['title'])?'Peoples':$people['title']; echo ' - ';echo empty($dept['title'])?'':$dept['title'];?></title>

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
            <div class="col-md-8 text-left">
                <?php
                    if($show==1){
                        //peoples
                        echo '<h1>'.$dept['title'].'</h1>';
                        foreach ($peoples as $people){
                            //echo $people['FirstName'].' '.$people['MiddleName'].' '.$people['LastName'].'<br>';
                            ?>
                        <table class="table">
                            <tr>
                                <td width="122"><a href="/department/<?php echo $people['code'];?>/faculty/<?php echo $people['EmpID'];?>"><img class="img-rounded" src="<?php $pp = str_replace('..',' ',$people['ProfilePhoto']); echo empty($pp)?'/upload/Prof_Picts/nophoto.jpg':$pp; ?>" width="120"></td>
                                <td class="text-left"><h3><?php echo $people['FirstName'].' '.$people['MiddleName'].' '.$people['LastName'];?></h3>
                                    <h5><?php echo $people['Title'];?></h5>
                                    <p>

                                        <?php echo empty($people['OtherDuty'])?'':'<b>'.$people['OtherDuty'].'</b><br>';?>
                                        <?php echo empty($people['Degree'])?'':$people['Degree'].'<br>'?>
                                        <?php echo empty($people['Email'])?'':$people['Email'].'<br>'?>
                                        <?php echo empty($people['webURL'])?'':'<a href="'.$people['webURL'].'">'.$people['webURL'].'</a><br>'?>
                                    </p>
                                </td>
                            </tr>
                        </table>
                        <?php
                        }
                    }
                    elseif($show==2){
                        ?>
                        <div class="row">
                            <div class="col-md-4">
                                <img class="img-rounded" src="<?php $pp = str_replace('..',' ',$people['ProfilePhoto']); echo empty($pp)?'/upload/Prof_Picts/nophoto.jpg':$pp; ?>"  width="160">
                            </div>
                            <div class="col-md-8">

                                <h3><?php echo $people['FirstName'].' '.$people['MiddleName'].' '.$people['LastName'];?></h3>
                                <h5><?php echo $people['Title'].', '.$dept['title'];?></h5>

                                <p>

                                    <?php echo empty($people['OtherDuty'])?'':'<b>'.$people['OtherDuty'].'</b><br>';?>
                                    <?php echo empty($people['Degree'])?'':$people['Degree'].'<br>'?>
                                    <?php echo empty($people['Email'])?'':$people['Email'].'<br>'?>
                                    <?php echo empty($people['webURL'])?'':'<a href="'.$people['webURL'].'">'.$people['webURL'].'</a><br><br>'?>

                                    <?php echo empty($people['SubjectsTaught'])?'':$people['SubjectsTaught'].'<br>'?>

                                </p>
                            </div>
                        </div>


                        <?php
                    }
                    else{}
                ?>
            </div>
            <div class="col-md-4">
                <div class="alert alert-info"><b>Navigation</b></div>
                <div>
                    <ul class="list-unstyled">
                        <li class=""><a href="/department/<?php echo $dept['code'];?>">About</a></li>
                        <li class=""><a href="/department/<?php echo $dept['code'];?>/faculty">Faculties</a></li>
                        <li class=""><a href="#">Staffs</a></li>
                        <li class=""><a href="#">Facilities</a></li>

                    </ul>
                </div>
            </div>
		</div>
          <br>

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
