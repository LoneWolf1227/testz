<?php

session_start();

class Addtask extends Controller{
    public function CreateView($viewName){
        $model = new \Models\Addtask();
        @$email = htmlspecialchars($_POST['email']);
        @$name = htmlspecialchars($_POST['name']);
        @$strOutput = htmlspecialchars($_POST['editor1']);
        $type = '';
        $mas = '';
        $isLoggedIn = false;
        $userStatus = '';

        if (isset($_POST['addtask'])){
            if (empty($email)){
                $type = 'danger';
                $mas .= 'Email не должно быт пустым';
            }
            elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $type = 'danger';
                $mas .= 'Email не валиден';
            }
            elseif (empty($name)){
                $type = 'danger';
                $mas .= 'Имя не должно быт пустым';
            }
            elseif (empty($strOutput)){
                $type = 'danger';
                $mas .= 'Пустая задача не принимается';
            }
            if ($mas == ''){
                $params = array(
                    'task' => $strOutput,
                    'nama' => $name,
                    'email' => $email,
                    'status' => 'Новое'
                );
                if ($model->addTasks($params)){
                    $type = 'success';
                    $mas = 'Задача добавлено успешно';
                }
            }
        }

        if (!empty($_SESSION['user_id']) and !empty($_SESSION['user_status'])){
            $isLoggedIn = true;
            $userStatus = $_SESSION['user_status'];
        }

        $vars = array(
            'massage' => array(
                'massage' => $mas,
                'type' => $type
            ),
            'user' => array(
                'isLoggedIn' => $isLoggedIn,
                'status' => $userStatus
            )
        );
        parent::render($viewName, 'Добавить задачу', $vars);
    }
}