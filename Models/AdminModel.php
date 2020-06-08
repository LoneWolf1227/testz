<?php

namespace Models;

class AdminModel extends Model
{
    public function getTaskById($id){
        $query = "SELECT * FROM tasks WHERE id = $id";
        $result = $this->dba->getAll($query);
        return $result;
    }

    public function updateById($id, $task, $status , $by_admin = ''){
        $query = "UPDATE `tasks` SET `task` = '$task', `status` = '$status',
                    `edit_by_admin` = '$by_admin' WHERE id = '$id'";
        $this->dba->query($query);
    }

}