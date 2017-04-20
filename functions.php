<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 14-08-2016
 * Time: 23:15
 */
class Functions
{
    function insertUpdateQuery($str){
        try {
            require_once 'db-config.php';
            $conn = mysqlConnector();
            $stmt = $conn->prepare($str);
            $stmt->execute();
            return $conn->lastInsertId();
        } catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }
    function deleteQuery($str){
        try {
            require_once 'db-config.php';
            $conn = mysqlConnector();
            $stmt = $conn->prepare($str);
            $stmt->execute();
            //return $conn->lastInsertId();
        } catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }

    function selectQuery($str){
        try {
            require_once 'db-config.php';
            $conn = mysqlConnector();
            $stmt = $conn->prepare($str);
            $stmt->execute();
            $ret = $stmt->fetch();
            return $ret;
        } catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }
    function selectQueries($str){
        try {
            require_once 'db-config.php';
            $conn = mysqlConnector();
            $stmt = $conn->prepare($str);
            $stmt->execute();
            $ret = $stmt->fetchAll();
            return $ret;
        } catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }

    function setLogin($u,$p){
        $str = "SELECT `id`,`name`, `email` FROM `users` WHERE (`email`='".$u."' OR `phone`='".$u."') AND `password`='".md5($p)."' LIMIT 1";
        $row = $this->selectQuery($str);
        if(empty($row)){
            return false;
        }
        else{
            @session_start();
            $_SESSION['id'] = $row['id'];
            @session_start();
            $_SESSION['name'] = $row['name'];
            @session_start();
            $_SESSION['email'] = $row['email'];
            @session_start();
            $_SESSION['login'] = '_sanjibnarzaryphdwork';
            return true;
        }
    }

    function isLoggedIn(){
        @session_start();
        if(isset($_SESSION['name'])&&isset($_SESSION['email'])&&isset($_SESSION['login'])){
            @session_start();
            if ($_SESSION['login']=='_sanjibnarzaryphdwork'){
                return true;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }
}