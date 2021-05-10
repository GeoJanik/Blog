<?php
namespace blogP4\model;
use \blogP4\model\Manager;
class PostManager extends Manager
{
    // Recuperer les posts
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');
        return $req;
    }

    // Recupéré un post
    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();
        return $post;
    }

    // création d'un post
    public function createPost($title, $content) {
        $db = $this->dbConnect();
        $req = $db->prepare("INSERT INTO posts(title, content, creation_date) VALUES (?, ?, NOW()) ");
        $newPost = $req->execute(array($title, $content));
        return $newPost;
    }

    // Supprimer un post
    public function deletePost($postId){
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM posts where id = ?');
        $deletePost = $req->execute(array($postId));
        return $deletePost;
    }

    // modifié un post
    public function updatePost($title, $content, $postId) {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE posts SET title = ?, content = ?, creation_date = NOW() WHERE id = ?');
        $updated = $req->execute(array($title, $content, $postId));
        return $updated;
    }
}