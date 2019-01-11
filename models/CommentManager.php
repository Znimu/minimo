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
                ORDER BY comment_date ASC';
        $comments = $db->prepare($sql);
        $comments->execute(array($postId));

        return $comments;
    }

    public function getCommentsAll()
    {
        $db = $this->dbConnect();
        $sql = 'SELECT *, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr
                FROM comments
                ORDER BY comment_date ASC';
        $comments = $db->query($sql);

        return $comments;
    }
    
    public function getComment($commentId)
    {
        $db = $this->dbConnect();
        $sql = 'SELECT *, DATE_FORMAT(comment_date, \'%Y-%m-%d\') AS comment_date_fr
                FROM comments
                WHERE id = ?';
        $comment = $db->prepare($sql);
        $comment->execute(array($commentId));

        return $comment;
    }

    public function modifyComment($id, $postId, $name, $email, $comment, $date) {
        $db = $this->dbConnect();
        $sql = 'UPDATE comments
                SET post_id = ' . $postId . ',
                    comment_name = "' . $name . '",
                    comment_email = "' . $email . '",
                    comment_content = "' . $comment . '",
                    comment_date = "' . $date . '"
                WHERE id = ' . $id;
        $comment = $db->query($sql);
        var_dump($sql);

        return $comment;
    }

    public function newComment($postId, $name, $email, $comment, $date)
    {
        $db = $this->dbConnect();
        $sql = 'INSERT INTO comments(post_id, comment_name, comment_email, comment_content, comment_date)
                VALUES(?, ?, ?, ?, ?)';
        $sql = 'INSERT INTO comments(post_id, comment_name, comment_email, comment_content, comment_date)
                VALUES(' . $postId . ', "' . $name . '", "' . $email . '", "' . $comment . '", "' . $date . '")';
        $comment = $db->query($sql);
        
        return $comment;
    }

    public function deleteComment($id) {
        $db = $this->dbConnect();
        $sql = 'DELETE FROM comments
                WHERE id = ' . $id;
        $comment = $db->query($sql);

        return $comment;
    }
}