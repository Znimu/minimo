<?php

// Chargement des classes
require_once('models/PostManager.php');

function listPosts()
{
    $postManager = new Minimo\Models\PostManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

    require('views/frontend/template_category.php');
}

function listPostsCategory($category)
{
    $postManager = new Minimo\Models\PostManager();
    $posts = $postManager->getPostsCategory($category);
    $action = "category";

    require('views/frontend/template_page.php');
}

function post()
{
    $postManager = new Minimo\PostManager();
    $commentManager = new Minimo\CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment)
{
    $commentManager = new Minimo\Model\CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function editComment($commentId)
{
    $commentManager = new Minimo\Model\CommentManager();

    $comment = $commentManager->getComment($commentId);

    require('view/frontend/commentView.php');
}

function updateComment($commentId, $author, $comment)
{
    $commentManager = new Minimo\Model\CommentManager();

    $success = $commentManager->updateComment($commentId, $author, $comment, $post_id);

    if ($success === false) {
        throw new Exception('Impossible de modifier le commentaire !');
    }
    else {
        $post_id = $commentManager->getComment($commentId);
        header('Location: index.php?action=post&id=' . $post_id['post_id']);
    }
}