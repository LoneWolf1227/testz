<?php


namespace classes;

use Models\LoginModel;

session_start();

class loginSystem
{
    public function login()
    {
        $login = new LoginModel();
        $mas = '';

        if (isset($_POST['login'])){
            $name = htmlspecialchars($_POST['name']);
            $pass = htmlspecialchars($_POST['password']);
            if (empty($name) and empty($pass)){
                $mas = 'Обе поля обязательны для заполнения';
            }
            else{
                $result = $login->getUserByName($name);
                if (!empty($result) and password_verify($pass,$result['0']['user_password']) and !empty($result['0']['user_name'])){
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

        return $vars;
    }

    public function checkLogin()
    {
        $checked = array(
            'isLoggedIn' => false,
            'userStatus' => '',
        );
        if (!empty($_SESSION['user_id']) and !empty($_SESSION['user_status'])){
            $checked = array(
                'isLoggedIn' => true,
                'userStatus' => $_SESSION['user_status'],
            );
        }

        return $checked;
    }

}