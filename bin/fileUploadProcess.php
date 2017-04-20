<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 20-12-2016
 * Time: 12:19 PM
 */
ob_start();
@session_start();
if(!isset($_SESSION['id'])){
    //header('Location: ../document-upload.php?status=error');
    //exit();
}
if (isset($_FILES['bodoDocument'])&&isset($_POST['user_id'])){
    $target_dir = "../uploads/";
    $dt = date('d-m-Y-');
    $target_file = $target_dir . $dt . basename($_FILES["bodoDocument"]["name"]);
    $uploadOk = 1;
    $docFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
// Check file size
    if ($_FILES["bodoDocument"]["size"] > 50000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
// Allow certain file formats
    if($docFileType != "doc" && $docFileType != "docx" && $docFileType != "pdf"
        && $docFileType != "png"&& $docFileType != "jpg" && $docFileType != "jpeg" ) {
        echo "Sorry, only doc, docx, pdf, jpg & png files are allowed.";
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        //header('Location: ../document-upload.php?status=error');
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["bodoDocument"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["bodoDocument"]["name"]). " has been uploaded.";
            header('Location: ../document-upload.php?status=success');
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}else{
    echo 'Please choose a file to upload';
    header('Location: ../document-upload.php?status=error');
}