<?php

Route::set('', function(){
    Index::CreateView('index', $_GET);
});

Route::set('index.php', function(){
    Index::CreateView('index', $_GET);
});

Route::set('login', function(){
    Login::CreateView('login');
});

Route::set('addtask', function(){
    Addtask::CreateView('addtask');
});

Route::set('admin', function(){
    Admin::CreateView('admin');
});

Route::set('logout',function(){
    $logout = new Controllers\Logout();
    $logout->Redirect();
});