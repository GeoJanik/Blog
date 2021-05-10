<?php
use blogP4\model\CommentManager;
require_once './model/CommentManager.php';

function showAdminView() {
    require('view/backend/adminView.php');
}

function articleViewAdmin() {
    require('view/backend/articleView.php');
}

function getReportComment() {
    $commentManager = new CommentManager();
    $reportedComments = $commentManager->getReportComment();
    require('view/backend/commentViewAdmin.php');
}

function deleteComment($comment_id) {
    $commentManager = new CommentManager();
    $commentManager->deleteComment($comment_id);
    getReportComment();   
}
