<?php

namespace Controllers;

class Controller{

    public function render($viewName, $title = '', $vars = []){
        extract($vars);
        $path = './includes/Views/'.$viewName.'.php';
        if (file_exists($path)){
            ob_start();
            require $path;
            $content = ob_get_clean();
            require './includes/Views/layout.php';
        }
    }
}