<?php
namespace blogP4\model;

class UserManager extends Manager {
   public function login($pseudo) {
       $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, pass FROM membres WHERE pseudo = :pseudo');
        $req->execute(array(
            ':pseudo' => $pseudo
        ));
        $user = $req->fetch();
        return $user;

   }
}

    

