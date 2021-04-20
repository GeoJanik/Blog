<?php

// Chargement des classes
use blogP4\model\CommentManager;
use blogP4\model\PostManager;
use blogP4\model\UserManager;

require_once './model/Manager.php';
require_once './model/PostManager.php';
require_once './model/CommentManager.php';
require_once './model/userManager.php';


function listPosts()
{
    $postManager = new PostManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet
    require('view/frontend/listPostsView.php');
}

function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function showLogginForm() {
    require ('view/frontend/connexionView.php');
}


function loginSubmit ($pseudo, $pass) 

{
    // Recup de l'utilisateur 
    var_dump(password_hash("BlogP4", PASSWORD_BCRYPT ));
   
    $userManager = new UserManager();
    $user = $userManager->login($pseudo);
    

    $isPassWordCorrect = password_verify($pass, $user['pass']);

    // Si on trouve rien dans la bdd
    if(!$user){
        echo 'erreur';
    } 
    // Sinon, si un user existe et si le pass est correcte
    elseif ($isPassWordCorrect) {
         
            session_start();
            $_SESSION['id'] = $user['id'];
            $_SESSION['pseudo'] = $pseudo;
            // On affiche l'index, l'acceuil 
            header('Location: index.php');
    }
        // Sinon on affiche la page d'erreur
        else {
            // header('Location: erreurView.php');
            var_dump($user['pass']);
        }
}
