<?php
function modeEditionSavePost($postId, $category, $title, $content)
{
    $postManager = new Minimo\Models\PostManager();
    $postManager->modeEditionUpdatePost($postId, $content, $title, $category);
}

if (!isset($_POST['articleId']) || $_POST['articleId'] === "")
    echo "Article ID vide";
elseif (!isset($_POST['category']) || $_POST['category'] === "")
    echo "Catégorie vide";
elseif (!isset($_POST['title']) || $_POST['title'] === "")
    echo "Titre vide";
elseif (!isset($_POST['content']) || $_POST['content'] === "")
    echo "Contenu vide";
else {
    require_once('../../models/ArticleManager.php');
    modeEditionSavePost($_POST['articleId'], $_POST['category'], $_POST['title'], $_POST['content']);
    
    echo "OK";
}