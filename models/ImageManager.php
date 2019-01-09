<?php

namespace Minimo\Models;

require_once("PostManager.php");

class ImageManager extends PostManager
{
    public function newImage($author, $title, $status, $name)
    {
        $db = $this->dbConnect();
        $sql = 'INSERT INTO posts (post_author, post_content, post_date, post_title, post_status, post_name, post_type)
                VALUES (' . $author . ', "", NOW(), "' . $title . '",
                        "' . $status . '", "' . $name . '", "file")';
        $article = $db->query($sql);
        var_dump($sql);

        return $article;
    }
}