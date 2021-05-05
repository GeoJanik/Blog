<?php
namespace blogP4\model;
class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));
        var_dump($postId);
        return $comments;
    }

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date, report) VALUES(?, ?, ?, NOW(), false)');
        $affectedLines = $comments->execute(array($postId, $author, $comment));
        return $affectedLines;
    }

    public function reportComment($comment_id) {
        $db = $this->dbconnect();
        $reportValues = $db->prepare('UPDATE comments SET report = 1 WHERE id = ?');
        $report = $reportValues->execute(array($comment_id));
        return $report;
    }

    public function getReportComment() {
        $db = $this->dbConnect();
        $dbRepport = $db->prepare('SELECT comment, author FROM comments WHERE report = 1');
        $dbRepport->execute();
        return $dbRepport;
    }

    public Function deletComment($comment_id) {
        $db = $this->dbConnect();
        $deletValues = $db->prepare('DELETE comment FROM comments where id = ?');
        $delet = $deletValues->execute(array($comment_id));
        return $delet;
    }
}
