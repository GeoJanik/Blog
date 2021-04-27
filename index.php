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
                post();
            } else{
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        else if ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
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
        } else if ($_GET['action'] == 'commentViewAdmin') {
            commentViewAdmin();
        } else if ($_GET['action'] == 'commentReport') {  

            if (!empty($_GET['commentID']) {
            reportComment();
            }
        }
    }
    else{  
        listPosts();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}


