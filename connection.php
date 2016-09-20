<?php

class db{
    
    public static $conn;

    public function __construct() {

    }

    public function __clone() {

    }

    public static function getInstance(){
        if(!isset(self::$conn)){
            self::$conn = mysqli_connect("localhost", "root", "root", "user_db") or die ("Cannot connect to database". mysqli_connect_error());
        }
        return self::$conn;
    }
}