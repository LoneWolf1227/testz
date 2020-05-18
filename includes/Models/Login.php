<?php


namespace Models;

class Login extends Model
{
    function getUserByName($name){
        $query = "SELECT u.user_id, u.user_name, u.user_password, s.status  FROM `users` u 
                    INNER JOIN status s WHERE u.user_name = '$name' AND s.id = u.user_status";
        $result = $this->dba->getAll($query);
        return $result;
    }
}