<?php

namespace Controllers;

use Models\AdminModel;
use classes\loginSystem;

class Admin extends Controller{

    public function CreateView($viewName){

        $check = new loginSystem();
        $checked = $check->checkLogin();

        if ($checked['userStatus'] != 'admin'){
            header('location: /index');
        }else{
            $model = new AdminModel;

            @$id = $_GET['task_id'];

            $result = $model->getTaskById($id);

            $done = '';
            if (@$result['0']['edit_by_admin'] == 1){
                $editedByAdmin = true;
            }
            else{
                $editedByAdmin = false;
            }
            @$status = $result['0']['status'];

            if (isset($_POST['edit'])){
                $editor = htmlspecialchars($_POST['editor1']);
                if (isset($_POST['done'])){
                    $done = $_POST['done'];
                }
                if ($editor !== $result['0']['task']){
                    $editedByAdmin = true;
                }
                if ($done === 'on'){
                    $status = 'Выполнено';
                }
                $model->updateById($id, $editor, $status, $editedByAdmin);
                $result = $model->getTaskById($id);
            }
            $vars = array(
                'data' => $result
            );
            parent::render($viewName, 'Админ панел', $vars);
        }
    }
}