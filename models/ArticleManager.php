<?php

namespace Minimo\Models;

require_once("PostManager.php");

class ArticleManager extends PostManager
{
    public function newArticle($author, $date, $content, $title, $status, $name, $category, $image)
    {
        $db = $this->dbConnect();
        $sql = 'INSERT INTO posts (post_author, post_date, post_content,
                                post_title, post_status, post_name, post_type, post_category)
                VALUES (' . $author . ', "' . $date . '", "' . $content . '", "' . $title . '",
                        "' . $status . '", "' . $name . '", "article", "' . $category . '")';
        $article = $db->query($sql);

        if ($image !== 0) {
            $sql = 'INSERT INTO posts_posts (post_id1, post_id2)
                    VALUES (' . $db->lastInsertId() . ', ' . $image . ')';
            $db->query($sql);
            var_dump($sql);
        }

        return $article;
    }

    public function getPost($postId , $sticky=false)
    {
        $db = $this->dbConnect();
        $sql = 'SELECT *,
                    a.id AS article_id,
                    DATE_FORMAT(a.post_date, \'%Y-%m-%d\') AS article_date_fr,
                    a.post_author AS article_author,
                    a.post_title AS article_title,
                    a.post_name AS article_name,
                    a.post_content AS article_content,
                    a.post_status AS article_status,
                    a.post_category AS article_category,
                    f.id AS image_id,
                    f.post_title AS image_title,
                    f.post_name AS image_name
                FROM posts AS a
                LEFT JOIN posts_posts AS pp ON a.id = post_id1
                LEFT JOIN posts AS f ON f.id = post_id2
                WHERE a.id = ' . $postId . '
                AND a.post_sticky = ' . $sticky . '
                ORDER BY a.post_date';
        $req = $db->query($sql);

        return $req;
    }

    public function getPostSticky()
    {
        $db = $this->dbConnect();
        $sql = 'SELECT *,
                    a.id AS article_id,
                    DATE_FORMAT(a.post_date, \'%Y-%m-%d\') AS article_date_fr,
                    a.post_author AS article_author,
                    a.post_title AS article_title,
                    a.post_name AS article_name,
                    a.post_content AS article_content,
                    a.post_status AS article_status,
                    a.post_category AS article_category,
                    f.id AS image_id,
                    f.post_title AS image_title,
                    f.post_name AS image_name
                FROM posts AS a
                LEFT JOIN posts_posts AS pp ON a.id = post_id1
                LEFT JOIN posts AS f ON f.id = post_id2
                WHERE a.post_sticky = true
                ORDER BY a.post_date';
        $req = $db->query($sql);

        return $req->fetch();
    }

    public function updateArticle($id, $author, $date, $content, $title, $status, $name, $category, $image) {
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
        $post = $db->query($sql);

        if (intval($image) !== 0) {  // Image non vide
            $sql = 'SELECT * FROM posts_posts
                    WHERE post_id1 = ' . $id;
            $trouve = $db->query($sql);
            if ($trouve->fetch()) { // $id Trouvé dans la table
                $sql = 'UPDATE posts_posts
                        SET post_id2 = ' . $image . '
                        WHERE post_id1 = ' . $id;
            }
            else { // $id non trouvé dans la table
                $sql = 'INSERT INTO posts_posts (post_id1, post_id2)
                        VALUES (' . $id . ', ' . $image . ')';
            }
        }
        else { // Image vide
            $sql = 'DELETE FROM posts_posts
                    WHERE post_id1 = ' . $id;
        }
        $db->query($sql);

        return $post;
    }
}