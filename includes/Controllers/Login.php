<?php

session_start();

class Login extends Controller{
    
    public function CreateView($viewName){
        $login = new Models\Login();
        $mas = '';

        if (isset($_POST['login'])){
            $name = htmlspecialchars($_POST['name']);
            $pass = htmlspecialchars($_POST['password']);
            if (empty($name) and empty($pass)){
                $mas = 'Обе поля обязательны для заполнения';
            }
            else{
                $result = $login->getUserByName($name);
                if (password_verify($pass,$result['0']['user_password']) and !empty($result['0']['user_name'])){
                    $_SESSION['user_id'] = $result['0']['user_id'];
                    $_SESSION['user_status'] = $result['0']['status'];
                    header('location: /');
                }
                else{
                    $mas = 'Неправильныу реквизиты доступа';
                }
            }
        }

        $vars = array(
            'massage' => array(
                'massage' => $mas,
                'type' => 'danger'
            )
        );
        parent::render($viewName, 'Вход', $vars);
    }
}