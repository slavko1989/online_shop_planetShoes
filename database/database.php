<?php

class Database
{
    private $connect;
    public function __construct(){
        $this->set_db();
    }
    public function set_db(){
        $connect = null;
        try {
            $connect = new PDO("mysql:host=localhost;dbname=planet_shoes","root","");
            $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        $this->connect = $connect;

    }
    public function get_db(){
        return $this->connect;
    }
}