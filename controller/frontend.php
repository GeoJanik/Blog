<?php

// Chargement des classes
use blogP4\model\CommentManager;
use blogP4\model\PostManager;
use blogP4\model\UserManager;

require_once './model/Manager.php';
require_once './model/PostManager.php';
require_once './model/CommentManager.php';
require_once './model/userManager.php';

// Fonction pour affiché les articles
function listPosts()
{
    $postManager = new PostManager(); 
    $posts = $postManager->getPosts(); 
    require('view/frontend/listPostsView.php');
}

// Fonction pour affiché un article séléctionné
function post($postId)
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();
    $post = $postManager->getPost($postId);
    $comments = $commentManager->getComments($postId);
    require('view/frontend/postView.php');
}

// Fonction pour mettre un commentaire
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

// View de la page de connexion
function showLogginForm() {
    require ('view/frontend/connexionView.php');
}

// Connexion
function loginSubmit ($pseudo, $pass) 
{
    // Recup de l'utilisateur 
    // var_dump(password_hash("BlogP4", PASSWORD_BCRYPT ));
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
// Deconnexion
function logOut(){
    $_SESSION = array();
    session_destroy();
    header('Location: index.php');
}

// Signalé un commentaire
function reportComment($comment_id, $post_id) {
    $report = new CommentManager();
    $reportComment = $report->reportComment($comment_id);   
    post($post_id);  
    echo "<script>alert(\"Le commentaire à été signalé\")</script>"; 
}
