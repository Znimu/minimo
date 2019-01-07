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
        $sql = 'SELECT *,
                    a.id AS article_id,
                    a.post_title AS article_title,
                    a.post_name AS article_name,
                    a.post_content AS article_content,
                    a.post_category AS article_category,
                    f.post_title AS image_title,
                    f.post_name AS image_name
                FROM posts AS a
                LEFT JOIN posts_posts AS pp
                ON a.id = post_id1
                LEFT JOIN posts AS f
                ON f.id = post_id2
                ORDER BY a.post_date DESC
                LIMIT 0, 2';
        $req = $db->query($sql);

        return $req;
    }

    public function get3Posts($postId = 0) // 3 articles, article affiché excepté
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