<?php
function getArticles() {
    $articleManager = new Minimo\Models\ArticleManager();
    $articles = $articleManager->getPosts("article");

    $userManager = new Minimo\Models\UserManager();
    $authors = $userManager->getUsers();

    require('views/backend/template_articles.php');
}

function getArticle($id) {
    $articleManager = new Minimo\Models\ArticleManager();
    $article = $articleManager->getPost($id);

    $userManager = new Minimo\Models\UserManager();
    $authors = $userManager->getUsers();

    require('views/backend/template_articles_editer.php');
}

function updateArticle($id, $author, $date, $content, $title, $status, $name, $category) {
    $articleManager = new Minimo\Models\ArticleManager();
    $resu = $articleManager->updatePost($id, $author, $date, $content, $title, $status, $name, $category);

    require('views/backend/template_articles_modifier.php');
}

function newArticle($author, $date, $content, $title, $status, $name, $category) {
    $articleManager = new Minimo\Models\ArticleManager();
    $newArticle = $articleManager->newArticle($author, $date, $content, $title, $status, $name, $category);
    
    if (!$newArticle)
        echo "Erreur : nouvel article non enregistré.";
    else
        header("Location: ?action=articles");
}

function deleteArticle($id) {
    $articleManager = new Minimo\Models\ArticleManager();
    $resu = $articleManager->deletePost($id);

    require('views/backend/template_articles_effacer.php');
}