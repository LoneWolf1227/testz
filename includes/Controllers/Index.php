<?php

use classes\paginData;

session_start();

class Index extends Controller{

    public function CreateView($viewName, $option){
        @$model = new \Models\Index();
        $isLoggedIn = false;
        $userStatus = '';

        if($_GET == array() || @$_GET['by'] == ''){
            $order = 'name';
            $sort = '';
            $_GET['p'] = 1;
        }
        else {
            $order = $option['by'];
            $sort = $option['sort'];
        }

        if (!empty($_SESSION['user_id']) and !empty($_SESSION['user_status'])){
            $isLoggedIn = true;
            $userStatus = $_SESSION['user_status'];
        }

        $result = $model->getTasks($order , $sort);
        $paginator = new paginData();
        $perPage = 3;
        $pd = $paginator->Pagin($result, $option, $perPage);

        $vars = [
            'pn' => $pd,
            'option' => $option,
            'user' => array(
                'isLoggedIn' => $isLoggedIn,
                'status' => $userStatus
            )
        ];
        parent::render($viewName, 'Главная страница', $vars);
    }
}