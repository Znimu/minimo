<?php

namespace Minimo\Models;

require_once("PostManager.php");

class ArticleManager extends PostManager
{
    public function newArticle($author, $date, $content, $title, $status, $name, $category)
    {
        $db = $this->dbConnect();
        $sql = 'INSERT INTO posts (post_author, post_date, post_content,
                                post_title, post_status, post_name, post_type, post_category)
                VALUES (' . $author . ', "' . $date . '", "' . $content . '", "' . $title . '",
                        "' . $status . '", "' . $name . '", "article", "' . $category . '")';
        $article = $db->query($sql);

        return $article;
    }
}