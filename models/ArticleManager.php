<?php

namespace Minimo\Models;

require_once("Manager.php");

class ArticleManager extends Manager
{
    public function getArticles()
    {
        $db = $this->dbConnect();
        $sql = 'SELECT *, posts.id AS post_id
                FROM posts, users
                WHERE post_type = "article"
                AND posts.post_author = users.id
                ORDER BY post_id';
        $req = $db->query($sql);

        return $req;
    }

    public function getArticle($articleId)
    {
        $db = $this->dbConnect();
        $sql = 'SELECT *, DATE_FORMAT(post_date, \'%Y-%m-%d\') AS post_date_fr
                FROM posts
                WHERE id = ' . $articleId;
        $req = $db->query($sql);

        return $req;
    }

    public function modifierArticle($id, $author, $date, $content, $title, $status, $name, $category) {
        $db = $this->dbConnect();
        $sql = 'UPDATE posts
                SET post_author = ' . $author . ',
                    post_date = "' . $date . '",
                    post_content = "' . $content . '",
                    post_title = "' . $title . '",
                    post_status = "' . $status . '",
                    post_name = "' . $name . '",
                    post_category = "' . $category . '"
                WHERE id = ' . $id;
        $article = $db->query($sql);

        return $article;
    }

    public function newArticle($author, $date, $content, $title, $status, $name, $category)
    {
        $db = $this->dbConnect();
        $sql = 'INSERT INTO posts (post_author, post_date, post_content,
                                post_title, post_status, post_name, post_category)
                VALUES (' . $author . ', "' . $date . '", "' . $content . '", "' . $title . '",
                        "' . $status . '", "' . $name . '", "' . $category . '")';
        $article = $db->query($sql);
        var_dump($sql);

        return $article;
    }

    public function effacerArticle($id) {
        $db = $this->dbConnect();
        $sql = 'DELETE FROM posts
                WHERE id = ' . $id;
        $article = $db->query($sql);

        return $article;
    }
}