<?php 
namespace blogP4\model;


class Manager {
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=blogP4;charset=utf8', 'root', '');
        return $db;
    }
}


