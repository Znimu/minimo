<?php

namespace Minimo\Models;

require_once("Manager.php");

class PostManager extends Manager
{
    public function getNBPosts($nb, $nb_articles_affiches)
    {
        $db = $this->dbConnect();
        $sql = 'SELECT *,
                    a.id AS article_id,
                    a.post_title AS article_title,
                    a.post_name AS article_name,
                    a.post_content AS article_content,
                    a.post_category AS article_category,
                    f.post_title AS image_title,
                    f.post_name AS image_name
                FROM posts AS a
                INNER JOIN posts_posts AS pp
                ON a.id = post_id1
                INNER JOIN posts AS f
                ON f.id = post_id2
                ORDER BY a.post_date DESC
                LIMIT ' . $nb_articles_affiches . ', ' . ($nb + $nb_articles_affiches);
        $req = $db->query($sql);

        return $req;
    }

    public function get3Posts($postId = 0) // 3 articles, article affiché excepté
    {
        $db = $this->dbConnect();
        $sql = 'SELECT *,
                    a.id AS article_id,
                    a.post_title AS article_title,
                    a.post_name AS article_name,
                    a.post_content AS article_content,
                    a.post_category AS article_category,
                    f.post_title AS image_title,
                    f.post_name AS image_name
                FROM posts AS a
                LEFT JOIN posts_posts AS pp ON a.id = post_id1
                LEFT JOIN posts AS f ON f.id = post_id2
                WHERE a.id <> ' . $postId . ' AND a.post_status = "publish"
                ORDER BY a.post_date DESC
                LIMIT 0, 3';
        $req = $db->query($sql);

        return $req;
    }

    public function getPostsCategory($postCat)
    {
        $db = $this->dbConnect();
        $sql = 'SELECT *,
                    a.id AS article_id,
                    a.post_title AS article_title,
                    a.post_name AS article_name,
                    a.post_content AS article_content,
                    a.post_category AS article_category,
                    f.post_title AS image_title,
                    f.post_name AS image_name
                FROM posts AS a
                LEFT JOIN posts_posts AS pp ON a.id = post_id1
                LEFT JOIN posts AS f ON f.id = post_id2
                WHERE a.post_category = "' . $postCat . '"
                AND a.post_status = "publish"
                ORDER BY a.post_date DESC
                LIMIT 0, 6';
        $req = $db->query($sql);

        return $req;
    }

    public function get1Post($postId)
    {
        $db = $this->dbConnect();
        $sql = 'SELECT *,
                    a.id AS article_id,
                    a.post_title AS article_title,
                    a.post_name AS article_name,
                    a.post_content AS article_content,
                    a.post_category AS article_category,
                    f.post_title AS image_title,
                    f.post_name AS image_name
                FROM posts AS a
                LEFT JOIN posts_posts AS pp ON a.id = post_id1
                LEFT JOIN posts AS f ON f.id = post_id2
                WHERE a.id = ' . $postId . '
                ORDER BY a.post_date DESC';
        $req = $db->query($sql);
        $post = $req->fetch();

        return $post;
    }

    public function getTopPosts() {
        $db = $this->dbConnect();
        $sql = 'SELECT *,
                COUNT(comments.id) AS nb_comments,
                posts.id AS post_id
                FROM posts, comments
                WHERE posts.id = comments.post_id
                GROUP BY comments.post_id
                ORDER BY nb_comments DESC, post_date DESC
                LIMIT 0, 3';
        $req = $db->query($sql);

        return $req;
    }

    // BACKEND ==================================================
    public function getPosts($type)
    {
        $db = $this->dbConnect();
        $sql = 'SELECT *, posts.id AS post_id
                FROM posts, users
                WHERE post_type = "' . $type . '"
                AND posts.post_author = users.id
                ORDER BY post_id';
        $req = $db->query($sql);

        return $req;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $sql = 'SELECT *, DATE_FORMAT(post_date, \'%Y-%m-%d\') AS post_date_fr
                FROM posts
                WHERE id = ' . $postId;
        $req = $db->query($sql);

        return $req;
    }

    public function updatePost($id, $author, $date, $content, $title, $status, $name, $category) {
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

        return $post;
    }

    public function deletePost($id) {
        $db = $this->dbConnect();
        
        $sql = 'DELETE FROM posts_posts
                WHERE post_id1 = ' . $id . '
                OR post_id2 = ' . $id;
        $db->query($sql);

        $sql = 'DELETE FROM posts
                WHERE id = ' . $id;
        $post = $db->query($sql);

        return $post;
    }
}