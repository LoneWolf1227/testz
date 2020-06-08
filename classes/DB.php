<?php

namespace classes;

use PDO;

class DB {

    protected $db;

    public function __construct()
    {
        $config = include '../config.php';
        $this->db = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'].'',
                            $config['user'], $config['pass'],
                            array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
                        );
    }

    public function query($sql, $params = []){
        $stmt = $this->db->prepare($sql);
        if(!empty($params)){
            foreach ($params as $key => $value) {
                $stmt->bindValue(':'.$key,$value);
            }
        }
        $stmt->execute();
        return $stmt;
    }

    public function getAll($sql, $params = []){
        $query = $this->query($sql, $params);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

}