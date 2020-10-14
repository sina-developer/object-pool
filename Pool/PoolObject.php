<?php

namespace Pool;

class PoolObject {
    private $created_at;
    private $data;

    function __construct(){
        $this->created_at = microtime();
    }

    public function setData($data){
        $this->data = $data;
    }

    public function getData(){
        return $this->data;
    }

    public function getCreatedAt(){
        return $this->created_at;
    }
}