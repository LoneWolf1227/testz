<?php

use classes\Route;

$router = new Route();

$router->set('', function(){
    $class = new Controllers\Index();
    $class->CreateView('index', $_GET);
});

$router->set('index.php', function(){
    $class = new Controllers\Index();
    $class->CreateView('index', $_GET);
});

$router->set('login', function(){
    $class = new Controllers\Login();
    $class->CreateView('login');
});

$router->set('addtask', function(){
    $class = new Controllers\addTask();
    $class->CreateView('addtask');
});

$router->set('admin', function(){
    $class = new Controllers\Admin();
    $class->CreateView('admin');
});

$router->set('logout',function(){
    $logout = new Controllers\Logout();
    $logout->Redirect();
});