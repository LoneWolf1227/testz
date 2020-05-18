<?php

namespace Models;

use classes\DB;

abstract class Model {

    public $dba;

    public function __construct(){
        $this->dba = new DB();
    }
}