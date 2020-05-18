<?php

Route::set('', function(){
    $index = new Controllers\Index();
    $index->CreateView('index', $_GET);
});

Route::set('index.php', function(){
    $index = new Controllers\Index();
    $index->CreateView('index', $_GET);
});

Route::set('login', function(){
    $login = new Controllers\Login();
    $login->CreateView('login');
});

Route::set('addtask', function(){
    $addTask = new Controllers\Addtask();
    $addTask->CreateView('addtask');
});

Route::set('admin', function(){
    $admin = new Controllers\Admin();
    $admin->CreateView('admin');
});

Route::set('logout',function(){
    $logout = new Controllers\Logout();
    $logout->Redirect();
});