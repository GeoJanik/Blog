<?php
require('./controller/frontend.php');
require('./controller/backend.php');
session_start();

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        } elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post(($_GET['id']));
            } else{
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        else if ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                } else {
                    echo "<script>alert(\"ATTENTION Tout les champs sont requis pour envoyer votre commentaire\")
                    </script>";
                    post(($_GET['id']));
                }
            } 
        } else if ($_GET['action'] == 'showLogginForm') {
            showLogginForm();
        } else if ($_GET['action'] == 'loginSubmit') {
            loginSubmit($_POST['pseudo'], $_POST['pass']);
        } else if ($_GET['action'] == 'logOut') {
            logOut();
        } else if ($_GET['action'] == 'showAdminView') {
            showAdminView();
        } else if ($_GET['action'] == 'articleViewAdmin') {
            articleViewAdmin();
        } else if ($_GET['action'] == 'commentReport') {  
            if (!empty($_GET['comment_id']) && (!empty($_GET['post_id']))) {
            reportComment($_GET['comment_id'], $_GET['post_id']);
            }
        } else if ($_GET['action'] == 'commentViewAdmin') {
            getReportComment();
        } else if ($_GET['action'] == 'deleteComment') {           
            if (!empty($_GET['comment_id'])) {
                deleteComment($_GET['comment_id']);
            }
        } else if ($_GET['action'] == 'ticketPost') {
            if (!empty($_POST['title']) && !empty($_POST['content'])){
                newPost($_POST['title'], $_POST['content']);
            } else {
                throw new Exception('contenu vide');
             }            
        } else if ($_GET['action'] == 'updateDeletePost') {
            showUpdateDeletePost();
        } else if ($_GET['action'] == 'deletePost') {
            removePost($_GET['id']);
        } elseif ($_GET['action'] == 'updatePost') {
			displayUpdate();
		} elseif ($_GET['action'] == 'submitUpdate') {
			submitUpdate($_POST['title'], $_POST['content'], $_GET['id']);
		}
    }
    else {  
        listPosts();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}


