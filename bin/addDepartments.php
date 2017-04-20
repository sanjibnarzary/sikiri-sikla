<?php


    if(isset($_POST['title'])&&isset($_POST['code'])&&isset($_POST['body'])&&isset($_POST['type'])){
        $title = $_POST['title'];
        $code = $_POST['code'];
        $body = $_POST['body'];
        $user = 1;
        $type = $_POST['type'];
        $dept_type = $_POST['dept_type'];
        if($type == 'new'){
            $str = "INSERT INTO `departments`(`code`, `title`,`type`, `body`, `created_by`,  `created_at`, `updated_at`) 
            VALUES ('".$code."','".$title."','".$dept_type."','".$body."','".$user."',NOW(),NOW())";
        }else if ($type =='update'){
            $pid = $_POST['id'];
            $str = "UPDATE `departments` SET `code`='".$code."',`title`='".$title."',`type`='".$dept_type."',`body`='".$body."',`updated_by`='".$user."',`updated_at`=NOW() WHERE id='".$pid."'";
            //echo $str;
        }
        if(redirectSecurely($str)){
            if($type =='update'){
                header('Location: ../admin/departments.php?id='.$pid.'');
            }
            else{
                header('Location: ../admin/departments.php');
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