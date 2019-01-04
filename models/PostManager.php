<?php

namespace Minimo\Models;

require_once("Manager.php");

class PostManager extends Manager
{
    public function get2Posts()
    {
        $db = $this->dbConnect();
        $sql = 'SELECT *, DATE_FORMAT(post_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr
                FROM posts
                WHERE post_status = "publish"
                AND post_type = "article"
                ORDER BY post_date DESC LIMIT 0, 2';
        $req = $db->query($sql);

        return $req;
    }

    public function get3Posts($postId)
    {
        $db = $this->dbConnect();
        $sql = 'SELECT *, DATE_FORMAT(post_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr
                FROM posts
                WHERE post_status = "publish"
                AND post_type = "article"
                AND id <> ' . $postId . '
                ORDER BY post_date DESC LIMIT 0, 3';
        $req = $db->query($sql);

        return $req;
    }

    public function getPostsCategory($postCat)
    {
        $db = $this->dbConnect();
        $sql = 'SELECT *
                FROM posts
                WHERE post_status = "publish"
                AND post_type = "article"
                AND post_category = "' . $postCat . '"
                ORDER BY post_date DESC LIMIT 0, 5';
        $req = $db->query($sql);

        return $req;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT *, DATE_FORMAT(post_date, \'%d/%m/%Y à %Hh%imin%ss\') AS post_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function getImg($postId)
    {
        $db = $this->dbConnect();
        $sql = 'SELECT *
                FROM posts, posts_posts
                WHERE post_id1 = ?
                AND post_id2 = id
                ORDER BY post_date
                DESC LIMIT 0, 5';
        $req = $db->prepare($sql);
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }
}