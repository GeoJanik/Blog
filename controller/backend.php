<?php
use blogP4\model\CommentManager;
use blogP4\model\PostManager;

require_once './model/CommentManager.php';

// View pour l'éspace ADMIN
function showAdminView() {
    require('view/backend/adminView.php');
}

// View pour la création d'un article
function articleViewAdmin() {
    require('view/backend/createArticleView.php');
}

// View de l'admin pour géré les articles
function showUpdateDeletePost() {
    $postManager = new PostManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet
    require('view/backend/updateDeletePost.php');
}

// Recuperer le commentaire signalé
function getReportComment() {
    $commentManager = new CommentManager();
    $reportedComments = $commentManager->getReportComment();
    require('view/backend/commentViewAdmin.php');
}

// Suppression du commentaire
function deleteComment($comment_id) {
    $commentManager = new CommentManager();
    $commentManager->deleteComment($comment_id);
    getReportComment(); 
    echo "<script>alert(\"Le commentaire a été supprimer\")</script>";  
}

// Création d'un nouveau post
function newPost($title, $content){
    $postManager = new PostManager();
    $newPost = $postManager->createPost($title, $content);
    header('Location: index.php');
}

// Suppression du post 
function removePost($postId){
    $postManager = new PostManager();
    $deletePost = $postManager->deletePost($postId);
    showUpdateDeletePost();
    echo "<script>alert(\"L'article à été supprimer\")</script>";
}

// Mis à jour du post
function submitUpdate($title, $content, $postId){
    $postManager = new PostManager();
    $updated = $postManager->updatePost($title, $content, $postId);
    showUpdateDeletePost();
    echo "<script>alert(\"L'article à été modifié\")</script>";
}

// Mis à jour de l'affichage
function displayUpdate() {
    $postManager = new PostManager();
	$post = $postManager->getPost($_GET['id']);
    require('view/backend/updatePostView.php');
}
