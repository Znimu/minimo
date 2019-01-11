<?php
function getComments() {
    $commentManager = new Minimo\Models\CommentManager();
    $comments = $commentManager->getCommentsAll();

    require('views/backend/template_comments.php');
}

function getComment($id) {
    $commentManager = new Minimo\Models\CommentManager();
    $comment = $commentManager->getComment($id);

    require('views/backend/template_comments_editer.php');
}

function modifyComment($id, $post_id, $name, $email, $message, $date) {
    $commentManager = new Minimo\Models\CommentManager();
    $resu = $commentManager->modifyComment($id, $post_id, $name, $email, $message, $date);

    require('views/backend/template_comments_modifier.php');
}

function newComment($postId, $name, $email, $message, $date) {
    $commentManager = new Minimo\Models\CommentManager();
    $newComment = $commentManager->newComment($postId, $name, $email, $message, $date);

    header("Location: ?action=comments");
}

function deleteComment($id) {
    $commentManager = new Minimo\Models\CommentManager();
    $resu = $commentManager->deleteComment($id);

    require('views/backend/template_comments_effacer.php');
}