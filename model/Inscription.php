<?php

class registration {

public function getRegistration() {

}

    public function getUser($pseudo, $pass) {
        $db = $this->dbConnect();
        $user = $db->prepare('');
        
    }


    private function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=blogP4;charset=utf8', 'root', '');
        return $db;
    }
}