<?php


    if(isset($_POST['title'])&&isset($_POST['slug'])&&isset($_POST['body'])&&isset($_POST['type'])){
        $title = $_POST['title'];
        $slug = $_POST['slug'];
        $body = $_POST['body'];
        $user = 1;
        $type = $_POST['type'];
        if($type == 'new'){
            $str = "INSERT INTO `pages`(`slug`, `title`, `body`, `created_by`,  `created_at`, `updated_at`) 
            VALUES ('".$slug."','".$title."','".$body."','".$user."',NOW(),NOW())";
        }else if ($type =='update'){
            $pid = $_POST['id'];
            $str = "UPDATE `pages` SET `slug`='".$slug."',`title`='".$title."',`body`='".$body."',`updated_by`='".$user."',`updated_at`=NOW() WHERE id='".$pid."'";
            //echo $str;
        }
        if(redirectSecurely($str)){
            if($type =='update'){
                header('Location: ../admin/pages.php?id='.$pid.'');
            }
            else{
               header('Location: ../admin/pages.php');
            }
        }

    }else{
        echo 'Something went wrong';
    }
    function redirectSecurely($str){
        require_once ('../functions.php');
        $f = new Functions();
        try {
            $f->insertUpdateQuery($str);
        }catch (Exception $e){
            echo $e->getMessage();
        }
        return !0;
    }