<?php


namespace Models;


class IndexModel extends Model{

    public function getTasks($order , $sort){

        $result = $this->dba->getAll('SELECT * FROM tasks ORDER BY '.$order. ' '. $sort );
        return $result;
    }
}