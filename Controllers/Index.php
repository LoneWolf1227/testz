<?php

namespace Controllers;

use Models\IndexModel;
use classes\paginData;
use classes\loginSystem;

class Index extends Controller{

    public function CreateView($viewName, $option){
        $model = new IndexModel();
        $loginsys = new loginSystem();

        if($_GET == array() || @$_GET['by'] == ''){
            $order = 'name';
            $sort = '';
            $_GET['p'] = 1;
        }
        else {
            $order = $option['by'];
            $sort = $option['sort'];
        }

        $result = $model->getTasks($order , $sort);

        $paginator = new paginData();
        $perPage = 3;
        $pd = $paginator->Pagin($result, $option, $perPage);

        $vars = [
            'pn' => $pd,
            'option' => $option,
            'user' => $loginsys->checkLogin(),
        ];
        parent::render($viewName, 'Главная страница', $vars);
    }
}