<?php

class AuthHelper{
    public function checkLoggedIn(){
        if(!isset($_SESSION['USER_EMAIL'])){
            header("Location: ".BASE_URL."login");
            die();
        }
    }
}