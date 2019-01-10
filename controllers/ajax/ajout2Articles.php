<?php
require_once('../../models/PostManager.php');

$nb_articles_affiches = $_POST['nb_articles_affiches'];

$postManager = new Minimo\Models\PostManager(); // Création d'un objet
$posts = $postManager->getNBPosts(2, $nb_articles_affiches); // Appel d'une fonction de cet objet

echo '<div class="grid-container">
        <div class="grid-x grid-margin-x">';

require('../../views/frontend/template_tiny_article.php');
require('../../views/frontend/template_tiny_article.php');

echo '</div>
    </div>';