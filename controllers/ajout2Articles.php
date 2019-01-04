<?php
require_once('../models/PostManager.php');

$postManager = new Minimo\Models\PostManager(); // Création d'un objet
$posts = $postManager->get2Posts(); // Appel d'une fonction de cet objet

echo '<div class="grid-container">
        <div class="grid-x grid-margin-x">';

$data1 = $posts->fetch();
$img1 = $postManager->getImg($data1['id']);
require('../views/frontend/template_tiny_article.php');

$data1 = $posts->fetch();
$img1 = $postManager->getImg($data1['id']);
require('../views/frontend/template_tiny_article.php');

echo '</div>
    </div>';
?>