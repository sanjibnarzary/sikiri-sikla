<?php
    require_once ('../functions.php');
    $f=new Functions();
    $row = [];
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $str = "SELECT * FROM `departments` WHERE `id`='".$id."' LIMIT 1";
        $department = $f->selectQuery($str);
    }
    if($f->isLoggedIn()){

    }
    else{
        header('Location: login.php');
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

    <title>Add Departments</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../assets/css/navbar-fixed-top.css" rel="stylesheet">
	<link href="../assets/css/styles.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../assets/js/ie-emulation-modes-warning.js"></script>
	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <?php
    include('../inc/navbar-top.php');
  ?>
  <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
		<!--
			@author: Sanjib Narzary
			@email: san@cit.ac.in or narzary@iitg.ernet.in
			@program: Bodo <==> English Parallel corpus adder.
		
		//-->


      <div class="well-lg" id="content">
          <?php
          if(isset($_GET['status'])&&$_GET['status']=='error'){
              ?>
              <div class="col-md-12">
                  <div class="alert alert-warning alert-dismissible text-center" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h2>There was an error while uploading your doc.</h2>
                  </div>

              </div>
              <?php
          }else if(isset($_GET['status'])&&$_GET['status']=='success'){
              ?>
              <div class="col-md-12">
                  <div class="alert alert-success alert-dismissible text-center" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h2>Your file has been uploaded.</h2>
                  </div>
              </div>
              <?php
          }

          ?>
		<div class="row">

            <div class="col-md-9">
                <form class="form" method="post" action="../bin/addDepartments.php">

                    <p>Page Edit/Add</p>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">Title</span>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Page title" aria-describedby="basic-addon2" value="<?php echo $department['title']?>">

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">Code</span>
                                        <input type="text" class="form-control" id="code" name="code" placeholder="Code: e.g., cse" aria-describedby="basic-addon2" value="<?php echo $department['code']?>">

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">Type</span>
                                        <select name="dept_type" class="form-control">
                                            <option value="core">Core Department</option>
                                            <option value="allied">Allied Engineering</option>
                                            <option value="basic">Basic Sciences</option>
                                            <option value="humanities">Humanities and Social Sciences</option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="body">About department</label>
                            <textarea class="form-control" name="body" id="body"><?php echo $department['body']?></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <input type="hidden" value="<?php if(isset($_GET['id'])){echo 'update';}else{echo 'new';}?>" name="type">
                        <input type="hidden" value="<?php if(isset($_GET['id'])){echo $_GET['id'];}?>" name="id">
                        <input type="hidden" name="user_id" value="<?php @session_start(); if(isset($_SESSION['id'])) echo $_SESSION['id'];?>">
                    </div>

                    <div class="col-md-12">
                        <button class="btn btn-md btn-info btn-block" type="submit" name="submitButton">Add/Update</button>
                    </div>

                </form>
            </div>
            <div class="col-md-3">
                <h5>Pages <a href="departments.php">add new</a></h5>
                <table class="table table-responsive">
                    <?php
                        $str = "SELECT * FROM `departments` WHERE 1 ORDER BY `title` ASC";
                        $departments = $f->selectQueries($str);
                        foreach ($departments as $department){
                            echo '<tr><td><a href="departments.php?id='.$department['id'].'">'.$department['title'].'</a></td></tr>';
                        }
                    ?>
                </table>
            </div>
		</div>

      </div>
		
      <div class="center-block text-center" id="footer-1">
	  &copy; 21 July, 2016 - <?php echo date('d F, Y');?> Sanjib Narzary, CLST, IIT Guwahati
	  </div>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery-3.1.0.min.js"></script>
    <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../assets/js/ie10-viewport-bug-workaround.js"></script>
  <script src="../assets/ckeditor/ckeditor.js"></script>

  <script>
  // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'body' );
      </script>
  </body>
</html>
