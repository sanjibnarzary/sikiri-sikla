<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 15-10-2016
 * Time: 15:58
 */
session_start();
session_destroy();
header('Location: login-window.php');