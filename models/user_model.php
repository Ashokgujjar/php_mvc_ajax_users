<?php

class User_model{
    
    public $userid;
    public $username;
    public $email;
    public $phone;
    
    public function __construct($userid, $username, $email, $phone) {
        $this->userid      = $userid;
        $this->username  = $username;
        $this->email     = $email;
        $this->phone     = $phone;
    }
    
    public static function getAllUsers(){
        $conn = db::getInstance();
        $sql = "SELECT * FROM user_mst";
        $result = mysqli_query($conn, $sql);
        $data = array();
        while($row = mysqli_fetch_assoc($result)){
            $data[] = new User_model($row['userid'],$row['username'],$row['email'],$row['phone']);
        }        
        return $data;
    }
    
    public static function saveUser(){
        $conn = db::getInstance();
        $data = $_POST;
        $status = 0;
        $sql = "INSERT into user_mst SET username = '".$data['username']."', email = '".$data['email']."', phone = '".$data['phone']."'  ";
        $result = mysqli_query($conn, $sql);
        if($result){
            $status = mysqli_insert_id($conn);
        }
        return $status;
    }
    
    public static function getUserDetailByuserID(){
        $conn = db::getInstance();
        $userid = ($_GET['userid']) ? $_GET['userid'] : 0;
        $data = array();
        $sql = "SELECT * FROM user_mst WHERE userid = '".$userid."' ";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            $data = mysqli_fetch_assoc($result);
        }
        return $data;
    }
    
    public static function updateUser(){
        $conn = db::getInstance();
        $data = $_POST;
        $status = FALSE;
        $sql = "UPDATE user_mst SET username = '".$data['username']."', email = '".$data['email']."', phone = '".$data['phone']."' WHERE  userid = '".$data['userid']."' ";
        $result = mysqli_query($conn, $sql);
        if(mysqli_affected_rows($conn) > 0){
            $status = TRUE;
        }
        return $status;
    }
    
    public static function deleteUser(){
        $conn = db::getInstance();
        $userid = ($_GET['userid']) ? $_GET['userid'] : 0;
        $status = FALSE;
        $sql = "DELETE FROM user_mst WHERE userid = '".$userid."' ";
        $result = mysqli_query($conn, $sql);
        if(mysqli_affected_rows($conn) > 0){
            $status = TRUE;
        }
        return $status;
    }
    
    
}

