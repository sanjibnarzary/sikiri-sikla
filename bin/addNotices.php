<?php
//addDepartments.phptitle=&notice_type=notice&circulation=on&dept_type=000&body=&notice_file=&type=new&id=&user_id=&submitButton=

    if(isset($_POST['title'])&&isset($_POST['notice_type'])&&isset($_POST['body'])){
        $title = $_POST['title'];
        $notice_type = $_POST['notice_type'];

        if($_POST['circulation']=='on'){
            $circulation = 1;
        }
        else{
            $circulation = 0;
        }
        $body = $_POST['body'];
        $user = 1;
        $type = $_POST['type'];
        $dept_type = $_POST['dept_type'];
        $file_name = fileUpload($_FILES['notice_file']);
        if(empty($file_name)){
            $s ='';
        }
        else{
            $s="`file_path`='".$file_name."',";
        }
        if($type == 'new'){
            $str = "INSERT INTO `notices`(`title`, `body`, `type`, `file_path`, `dept_code`, `circulation`, 
            `created_by`, `created_at`, `updated_at`) 
            VALUES ('".$title."','".$body."','".$notice_type."','".$file_name."','".$dept_type."','".$circulation."','".$user."',NOW(),NOW())";
        }else if ($type =='update'){
            $pid = $_POST['id'];
            $str = "UPDATE `notices` SET `title`='".$title."',`type`='".$dept_type."',`body`='".$body."',".$s."`updated_by`='".$user."',`updated_at`=NOW() WHERE id='".$pid."'";
            //echo $str;
        }
        if(redirectSecurely($str)){
            if($type =='update'){
                header('Location: ../admin/notices.php?id='.$pid.'');
            }
            else{
                header('Location: ../admin/notices.php');
            }
        }

    }else{
        echo 'Something went wrong';
    }
    function redirectSecurely($str){
        require_once ('../functions.php');
        $f = new Functions();
        $f->insertUpdateQuery($str);
        echo $str;
        return !0;
    }
    function fileUpload($notice_file){
        $target_dir = "../uploads/notices/";
        $dt = 'citk-'.date('d-m-Y-');
        $target_file = $target_dir . $dt . basename(str_replace(' ','-',$notice_file["name"]));
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
            if (move_uploaded_file($notice_file["tmp_name"], $target_file)) {
                echo "The file ". basename( $notice_file["name"]). " has been uploaded.";
                return $dt.basename( $notice_file["name"]);
                //header('Location: ../document-upload.php?status=success');
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }