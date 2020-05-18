<?php

Route::set('', function(){
    $class = new Controllers\Index();
    $class->CreateView('index', $_GET);
});

Route::set('index.php', function(){
    $class = new Controllers\Index();
    $class->CreateView('index', $_GET);
});

Route::set('login', function(){
    $class = new Controllers\Login();
    $class->CreateView('login');
});

Route::set('addtask', function(){
    $class = new Controllers\Addtask();
    $class->CreateView('addtask');
});

Route::set('admin', function(){
    $class = new Controllers\Admin();
    $class->CreateView('admin');
});

Route::set('logout',function(){
    $logout = new Controllers\Logout();
    $logout->Redirect();
});