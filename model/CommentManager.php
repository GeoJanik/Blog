<?php
namespace blogP4\model;
class CommentManager extends Manager
{
    // Recuperer commentaire
    public function getComments($postId) {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));
        // var_dump($postId);
        return $comments;
    }

    // Posté un commentaire
    public function postComment($postId, $author, $comment) {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date, report) VALUES(?, ?, ?, NOW(), false)');
        $affectedLines = $comments->execute(array($postId, $author, $comment));
        return $affectedLines;
    }

    // Reporté un commentaire
    public function reportComment($comment_id) {
        $db = $this->dbconnect();
        $reportValues = $db->prepare('UPDATE comments SET report = 1 WHERE id = ?');
        $report = $reportValues->execute(array($comment_id));
        return $report;
    }
    
    // Selectionné le commentaire reporté
    public function getReportComment() {
        $db = $this->dbConnect();
        $dbRepport = $db->prepare('SELECT comment, author, id FROM comments WHERE report = 1');
        $dbRepport->execute();
        return $dbRepport;
    }

    // Supprimer un commentaire
    public function deleteComment($comment_id) {
        $db = $this->dbConnect();
        $deleteValues = $db->prepare('DELETE FROM comments where id = ?');
        $deleteValues->execute(array($comment_id));
        return;
    }
}
