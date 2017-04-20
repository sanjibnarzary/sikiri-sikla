<?php
    require_once ('functions.php');
    $f=new Functions();
    if($f->isLoggedIn()){

    }
    else{
        //header('Location: login.php');
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

    <title>Upload a bodo document in the BodoMT&trade; Bodo Machine Translation Project</title>

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
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form class="form" method="post" action="bin/fileUploadProcess.php" enctype="multipart/form-data">

                    <div class="col-md-12">
                        <div class="alert alert-info text-center">
                            <h2>Upload a document at BodoMT&trade;</h2>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input name="bodoDocument" required id="bodoDocument" type="file" style="display:none" />
                            <label for="file">Select a Bodo Document/s</label>
                            <div class="input-group">
                                <input type="text" class="form-control fileChooser"  onclick="fileChooser()" id="fileChooserTextBox" placeholder="Click on Choose a file to upload" aria-describedby="basic-addon2">
                                <span class="input-group-addon fileChooser" onclick="fileChooser()" id="fileChooserButton">Choose a File</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <input type="hidden" name="user_id" value="<?php @session_start(); if(isset($_SESSION['id'])) echo $_SESSION['id'];?>">
                    </div>
                    <div class="col-md-12">
                        <div class="alert alert-warning">
                            Bodo Text document must be written in Devanagiri script and should not be encoded inside an image/pdf.
                            Acceptable file formats are DOC/DOCX/RTF/TXT/DOT only.
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-md btn-info btn-block" type="submit" name="submitButton">Upload Now</button>
                    </div>

                </form>
            </div>
            <div class="col-md-3"></div>
		</div>

      </div>
		
      <div class="center-block text-center" id="footer">
	  &copy; 21 July, 2016 - <?php echo date('d F, Y');?> Sanjib Narzary, CLST, IIT Guwahati
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
      <script type="text/javascript">
        function fileChooser(){
            $('#bodoDocument').click();
        }
        $('input[type=file]').change(function () {
            var filePath = $(this).val();
            console.log(filePath);
            $('#fileChooserTextBox').val(filePath)
        });
      </script>
  </body>
</html>
