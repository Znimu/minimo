<?php
// Chargement des classes
require_once('models/PostManager.php');
require_once('models/CommentManager.php');
require_once('models/ContactManager.php');

function get2Posts()
{
    $postManager = new Minimo\Models\PostManager();
    $posts = $postManager->getPosts(2);

    require('views/frontend/template_accueil.php');
}

function listPostsCategory($category)
{
    $postManager = new Minimo\Models\PostManager();
    $posts = $postManager->getPostsCategory($category);
    $action = "categorie";
    $nb_posts = 0;
    while ($post = $posts->fetch()) {
        $data[] = $post;
        $img[] = $postManager->getImg($data[$nb_posts]['id']);
        $nb_posts++;
    }

    require('views/frontend/template_page.php');
}

function getPost()
{
    $articleEnCours = $_GET['id'];
    $postManager = new Minimo\Models\PostManager();
    $commentManager = new Minimo\Models\CommentManager();

    $post0 = $postManager->getPost($articleEnCours);
    $comments = $commentManager->getComments($articleEnCours);
    $posts = $postManager->get3Posts($articleEnCours);

    require('views/frontend/template_article.php');
}

function get3PostsMore($action)
{
    $articleEnCours = 0;
    $postManager = new Minimo\Models\PostManager();

    $posts = $postManager->get3Posts($articleEnCours);
    
    require "views/frontend/template_page.php";
}

function newContact($action, $erreur) {
    $articleEnCours = 0;
    $postManager = new Minimo\Models\PostManager();

    $posts = $postManager->get3Posts($articleEnCours);

    if ($erreur === "") {
        $contactManager = new Minimo\Models\ContactManager();
        $contactManager->newContact($_POST['contact_name'], $_POST['contact_email'], $_POST['contact_message']);
    }

    require "views/frontend/template_page.php";
}
/*
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
}*/

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