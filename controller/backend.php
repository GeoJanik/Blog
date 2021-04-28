<?php
use blogP4\model\CommentManager;

require_once './model/CommentManager.php';


function showAdminView() {
    require ('view/backend/adminView.php');
    }

function articleViewAdmin() {
    require ('view/backend/articleView.php');
}

function commentViewAdmin() {
    require ('view/backend/commentViewAdmin.php');
}


