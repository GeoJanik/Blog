<?php 
namespace blogP4\model;

// Connection DB 
class Manager {
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=db5002458479.hosting-data.io;dbname=dbs1960803;charset=utf8', 'dbu746359', 'BlogP4Geo');
        return $db;
    }
}


