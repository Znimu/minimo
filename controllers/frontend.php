<?php
// Chargement des classes
require_once('models/PostManager.php');
require_once('models/CommentManager.php');

function get2Posts()
{
    $postManager = new Minimo\Models\PostManager(); // Création d'un objet
    $posts = $postManager->get2Posts(); // Appel d'une fonction de cet objet
    $data[] = $posts->fetch();
    $data[] = $posts->fetch();
    $img[] = $postManager->getImg($data[0]['id']);
    $img[] = $postManager->getImg($data[1]['id']);

    require('views/frontend/template_accueil.php');
}

function listPostsCategory($category)
{
    $postManager = new Minimo\Models\PostManager();
    $posts = $postManager->getPostsCategory($category);
    $action = "categorie";

    $posts = $postManager->get3Posts(0);
    for ($i = 0; $i < 3; $i++) {
        $data3Posts[] = $posts->fetch();
        $img3Posts[] = $postManager->getImg($data3Posts[$i]['id']);
    }

    require('views/frontend/template_page.php');
}

function getPost()
{
    $articleEnCours = $_GET['id'];
    $postManager = new Minimo\Models\PostManager();
    $commentManager = new Minimo\Models\CommentManager();

    $post = $postManager->getPost($articleEnCours);
    $img = $postManager->getImg($articleEnCours);
    $comments = $commentManager->getComments($articleEnCours);

    $posts = $postManager->get3Posts($articleEnCours);
    for ($i = 0; $i < 3; $i++) {
        $data3Posts[] = $posts->fetch();
        $img3Posts[] = $postManager->getImg($data3Posts[$i]['id']);
    }

    require('views/frontend/template_article.php');
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