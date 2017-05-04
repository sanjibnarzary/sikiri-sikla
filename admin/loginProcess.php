<?php
/**
 * User: Sanjib Narzary
 * Date: 06-10-2016
 * Time: 22:31
 * name=Sanjib&email=asdasd%40asdad.com&phone=123&author=non-author&noOfPaper=100
 * &paper=&lsiMembership=nonmemberYear&totalCost=250&authorSubmitButton=
 *
 * name=Sanjib+Narzary&email=o-._.-o%40live.com&phone=8811073187&author=author&noOfPaper=2&
 * paper=Make+me+&lsiMembership=member&accomodationRequired=Yes&authorSubmitButton=
 */


//if(isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['phone'])){
    //correct lets go
session_start();
require_once('../functions.php');
$f = new Functions();
if(isset($_POST['username'])&&isset($_POST['password'])){
    //$str = "SELECT * from `admin_users` WHERE `username`='".$_POST['username']."' AND `password`='".md5($_POST['password'])."' LIMIT 1";
    //$row = $f->selectQuery($str);
    $u=$_POST['username'];
    $p=$_POST['password'];
    if($f->setLogin($u,$p)){
        //redirect not found any data
        header('Location: notices.php');
        //echo 'no such user data';
    }
    else{
        //not found
        //echo 'not found';
        header('Location: login-window.php?error');
    }
}
else{
    echo 'You must logged in with proper way';
}