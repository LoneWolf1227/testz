<?php

namespace classes;

class Route{

    public $validRoutes = array();

    public function set($route, $function){
        $this->validRoutes[] = $route;

        if (@$_GET['url'] == $route){
            $function->__invoke();
        }
    }
}