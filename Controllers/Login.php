<?php

namespace Controllers;

use classes\loginSystem;

class Login extends Controller{

    public function CreateView($viewName){
        $loginsys = new loginSystem();

        $vars = $loginsys->login();

        parent::render($viewName, 'Вход', $vars);
    }
}