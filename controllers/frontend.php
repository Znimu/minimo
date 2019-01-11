<?php
require('frontend-connexion.php');

function get2Posts()
{
    $postManager = new Minimo\Models\PostManager();
    $posts = $postManager->getNBPosts(2, 0);

    require('views/frontend/template_accueil.php');
}

function listPostsCategory($category)
{
    $postManager = new Minimo\Models\PostManager();
    $posts = $postManager->getPostsCategory($category);
    $action = "categorie";

    require('views/frontend/template_page.php');
}

function get1Post()
{
    $articleEnCours = $_GET['id'];
    $postManager = new Minimo\Models\PostManager();
    $commentManager = new Minimo\Models\CommentManager();

    $post0 = $postManager->get1Post($articleEnCours);
    $comments = $commentManager->getComments($articleEnCours);
    $nbComments = $comments->rowCount();
    $posts = $postManager->get3Posts($articleEnCours);
    $topPosts = $postManager->getTopPosts();

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

function editionModeEngaged()
{
    $_SESSION['edition'] = true;
    header('Location: index.php?action=accueil');
}

function editionModeDisengaged()
{
    unset($_SESSION['edition']);
    header('Location: index.php?action=accueil');
}