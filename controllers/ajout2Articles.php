<?php
require_once('../models/PostManager.php');

$postManager = new Minimo\Models\PostManager(); // Création d'un objet
$posts = $postManager->getPosts(2); // Appel d'une fonction de cet objet

echo '<div class="grid-container">
        <div class="grid-x grid-margin-x">';

require('../views/frontend/template_tiny_article.php');
require('../views/frontend/template_tiny_article.php');

echo '</div>
    </div>';