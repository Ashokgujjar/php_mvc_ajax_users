<?php

class Page_controller{
    
    public function home() {
        require_once 'views/page/home.php';
    }
    
    public function error() {
        require_once 'views/page/error.php';
    }
}
