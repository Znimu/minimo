<?php
function newComment($postId, $name, $email, $comment)
{
    $emailManager = new Minimo\Models\CommentManager();
    $emailManager->newComment($postId, $name, $email, $comment);
}

if (!isset($_POST['postId']) || $_POST['postId'] === "")
    echo "Post ID vide";
elseif (!isset($_POST['name']) || $_POST['name'] === "")
    echo "Nom vide";
elseif (!isset($_POST['email']) || $_POST['email'] === "")
    echo "Email vide";
elseif (!isset($_POST['comment']) || $_POST['comment'] === "")
    echo "Commentaire vide";
else {
    require_once('../models/CommentManager.php');
    newComment($_POST['postId'], $_POST['name'], $_POST['email'], $_POST['comment']);

    $comment['comment_name'] = $_POST['name'];
    $comment['comment_content'] = $_POST['comment'];
    $comment['comment_date'] = "new";

    require "../views/frontend/template_comment.php";
}