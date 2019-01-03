<?php

namespace Minimo\Models;

require_once("Manager.php");

class PostManager extends Manager
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT *, DATE_FORMAT(post_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr
                            FROM posts
                            WHERE post_status = "publish"
                            AND post_type = "article"
                            ORDER BY post_date DESC LIMIT 0, 5');

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
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function getFiles($postId)
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT *
                            FROM posts, posts_posts
                            WHERE post_status = "publish"
                            AND post_type = "file"
                            AND ' . $postId . ' = post_id1
                            AND posts.id = post_id2
                            ORDER BY creation_date DESC LIMIT 0, 5');

        return $req;
    }
}