<?php
    //MySQL Credentials
    $host = "127.0.0.1";
    $user = "root";
    $pass = "";
    $database = "apitest";
    $table = "users";
    
    //connect to mysql
    class Connections {
        public static $MYSQL;
    }
    
    Connections::$MYSQL = mysqli_connect($host, $user, $pass);
    
    //create a new database
    $query = sprintf("CREATE DATABASE IF NOT EXISTS %s", $database);
        $result = fancy_query($query);
        
        mysqli_select_db(Connections::$MYSQL, $database);
        
    $query = sprintf("CREATE TABLE IF NOT EXISTS %s (".
                     "user_id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, ".
                     "username VARCHAR(25) NOT NULL, ".
                     "password VARCHAR(50) NOT NULL, ".
                     "UNIQUE (username))"
                     , $table);
        $result = fancy_query($query);
        
        if($result)
        {
            echo "<h1>Table created!</h1>";
        }
        
    function fancy_query($__query)
    {
        $internal_result = mysqli_query(Connections::$MYSQL, $__query);
        
        if(!$internal_result)
        {
            die("Mysql Query Failed: ". mysqli_error());
        }
        
        return $internal_result;
    }
    
    /**
    * QUESTIONS:
    * 
    * CONTENT
    *  1)Why not using mysqli?
    *  2)PDO?  A subject for another time?
    *  3)"%s", brief overview of use in SQL
    *  4)should $result or $internal_result initially be set to null?
    * 
    * STYLE
    *  1) Do you typically put functions below your other code?
    *  2)Why concatenate the SQL in the CREATE TABLE statement?  Is there a performance hit with each concatenate?
    */
?>