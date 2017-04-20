<?php
define('DB_HOST', 'localhost');
define('DB_USER','sn');
define('DB_PASS','abc@123');
define('DB_BASE','cit_kokrajhar');
define('DB_PORT',3306);
function mysqlConnector(){
    $dsn = 'mysql:dbname='.DB_BASE.';host='.DB_HOST.';port='.DB_PORT;
    $dbh = new PDO($dsn, DB_USER, DB_PASS);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbh;
}

?>