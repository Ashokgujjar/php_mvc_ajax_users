<?php

$controllers = array("page" => ["home","error"],
    "user" => ["listuser", "adduser", "saveuser", "edituser", "updateuser", "deleteuser"]);

if(array_key_exists($controller, $controllers)){
    if(in_array($action, $controllers[$controller])){
        call($controller, $action);
    }else{
        call("page", "error");
    }
}else{
    call("page", "error");
}

function call($controller, $action){
    require_once ('controllers/'. $controller .'_controller.php');
    
    switch ($controller) {
        case "page":
            $controller = new Page_controller();
            break;
        case "user":
            require_once ('models/user_model.php');
            $controller = new User_controller();
            break;
    }
    $controller->{$action}();
}
