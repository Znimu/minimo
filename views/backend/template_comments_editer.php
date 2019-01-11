<?php $title = "Minimo Admin - Commentaires"; ?>

<?php ob_start(); ?>
<div class="grid-container">
	<h1>Commentaires - édition</h1>

    <?php
        if ($comment = $comment->fetch()) {
    ?>
        <form action="?action=modifierCommentaire" method="post" id="form-editer-commentaire" name="form-editer-commentaire">
            <input type="hidden" id="id" name="id" value="<?= $comment['id'] ?>" />
            <input type="text" id="post_id" name="post_id" value="<?= $comment['post_id'] ?>" />
            <input type="text" id="name" name="name" value="<?= $comment['comment_name'] ?>" placeholder="NOM" />
            <input type="text" id="email" name="email" value="<?= $comment['comment_email'] ?>" placeholder="E-MAIL" />
            <input type="date" id="date" name="date" value="<?= $comment['comment_date_fr'] ?>" />
            <textarea id="content" name="content" placeholder="MESSAGE"><?= $comment['comment_content'] ?></textarea>
            <input type="submit" value="Modifier ce commentaire" class="btn-modify-submit" />
        </form>
    <?php
        }
    ?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>