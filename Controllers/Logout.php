<?php

namespace Controllers;

session_start();

class Logout{
    function Redirect(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_status']);
        session_destroy();
        header('location: /index.php');
    }
}