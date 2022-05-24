<?php
    define("DB_SERVER", 'localhost');
    define("DB_USER", 'root');
    define("DB_PASS", '');
    define("DB_NAME", 'products_manager');

    $connection =  new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    
    function db_connect(){
        $connection =  new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        confirm_db_connect($connection);
        return $connection;
    }

    function confirm_db_connect($connection){
        if ($connection->connect_errno){
            $msg = "database connection failed: ";
            $msg .= $connection->connect_error;
            $msg .= "(". $connection->connect_errno .")";
            exit($msg);
        }
    }

    $database = db_connect();
?>