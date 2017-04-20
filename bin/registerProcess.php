<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 18-12-2016
 * Time: 05:54 PM
 */
if(isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['password'])&&isset($_POST['phone'])&&isset($_POST['tos'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $tos = $_POST['tos'];
    if ($tos =='on'){
        require_once ('../functions.php');
        $f = new Functions();
        $str = "INSERT INTO `users`(`name`, `email`, `phone`, `password`, `created_at`) VALUES 
        ('".$name."','".$email."','".$phone."','".md5($password)."',NOW())";
        $uid = $f->insertUpdateQuery($str);
        if($uid>0){
            if($f->setLogin($email,$password)){
                echo 'logged in';
            }else{
                echo 'Problem in logging in';
            }
        }
    }else{
        echo 'You are not allowed to registered!';
    }
}
else{
    echo 'Submit it correctly';
}