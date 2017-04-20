<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 18-12-2016
 * Time: 07:13 PM
 */
if(isset($_POST['email'])&&isset($_POST['password'])){
    require_once ('../functions.php');
    $f=new Functions();
    if($f->setLogin($_POST['email'],$_POST['password'])){
        //logged in
        echo 'logged in';
    }else{
        //user name or password incorrect
        echo 'something wrong';
    }
}
else{
    echo 'could not logged in';
}