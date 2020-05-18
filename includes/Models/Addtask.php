<?php


namespace Models;

class Addtask extends Model
{
    public function addTasks($params){
        $query = 'INSERT INTO tasks(`task`, `name`, `email`, `status`) VALUES (:task,:nama,:email,:status)';
        $result = $this->dba->query($query, $params);
        return $result;
    }
}