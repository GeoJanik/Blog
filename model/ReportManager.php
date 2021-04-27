<?php

class ReportManager extends Manager {
    public function getIdReport($memberId) {
        $db = $this->dbconect();
        $req = $db->prepare('SELECT comment_id FROM reports WHERE member_id = ?');
        $req->execute(array($memberId));
        $report = $req->fetch();
        $idComment;
    }
}