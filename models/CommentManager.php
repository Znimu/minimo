<?php

namespace Minimo\Models;

require_once("Manager.php");

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $sql = 'SELECT *, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr
                FROM comments
                WHERE post_id = ?
                ORDER BY comment_date DESC';
        $comments = $db->prepare($sql);
        $comments->execute(array($postId));

        return $comments;
    }

    public function postComment($postId, $name, $email, $comment)
    {
        $db = $this->dbConnect();
        $sql = 'INSERT INTO comments(post_id, comment_name, comment_email, comment, comment_date)
                VALUES(?, ?, ?, ?, NOW())';
        $comments = $db->prepare($sql);
        $affectedLines = $comments->execute(array($postId, $name, $email, $comment));

        return $affectedLines;
    }
}