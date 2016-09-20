<?php

class User_controller{
    
    public function listuser($msg = ""){
        $users = User_model::getAllUsers();
        require_once('views/users/listuser.php');
    }
    
    public function addUser(){
        require_once('views/users/adduser.php');
    }
    
    public function editUser(){
        $userdata = User_model::getUserDetailByuserID();
        if(count($userdata) > 0){
            require_once('views/users/adduser.php');
        }else{
            $msg = "Something Went Wrong";
            $this->listuser($msg);
        }
    }
    
    public function saveUser(){
        $isSaved = User_model::saveUser();
        if($isSaved > 0){
            $msg = "User Saved";
        }else{
            $msg = "User Not Saved";
        }
        $this->listuser($msg);
    }
    
    public function updateUser(){
        $isSaved = User_model::updateUser();
        if($isSaved){
            $msg = "User Updated";
        }else{
            $msg = "User Not Updated";
        }
        $this->listuser($msg);
    }
    
    public function deleteUser(){
        $isSaved = User_model::deleteUser();
        if($isSaved){
            $msg = "User Deleted";
        }else{
            $msg = "User Not Deleted";
        }
        $this->listuser($msg);
    }
}
