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

    public function getFiles()
    {
        if ($dossier = opendir('./public/img/'))
        {
            while (false !== ($file = readdir($dossier)))
            {
                if ($file != '.' && $file != '..' && $file != 'upload' && $file != '09_me.png' && $file != 'logo_minimo.png' && $file != 'pub.png')
                {
                    //echo $file . "<br />";
                    $images[] = $file;
                }
            }
            return $images;
        }
    }

    public function uploadFile($index, $destination, $maxsize = FALSE, $extensions = FALSE)
    {
       //Test1: fichier correctement uploadé
        if (!isset($_FILES[$index]) OR $_FILES[$index]['error'] > 0) {
            echo "Erreur upload : " . $_FILES[$index]['error'] . "<br />";
            return FALSE;
        }
       //Test2: taille limite
        if ($maxsize !== FALSE AND $_FILES[$index]['size'] > $maxsize) {
            echo "Taille limite dépassée.<br />";
            return FALSE;
        }
        //Test3: extension
        $ext = substr(strrchr($_FILES[$index]['name'],'.'),1);
        if ($extensions !== FALSE AND !in_array($ext, $extensions)) {
            echo "Mauvaise extensions (png, gif, jpg, jpeg).<br />";
            return FALSE;
        }
        //Déplacement
        return move_uploaded_file($_FILES[$index]['tmp_name'], $destination);
    }
}