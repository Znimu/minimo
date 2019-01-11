<?php $title = "Minimo Admin - Comments"; ?>

<?php ob_start(); ?>
<div class="grid-container">
	<h1>Comments</h1>
    <a href="?action=newCommentaire#form-new-comment">&#x21E8; Nouveau commentaire</a>
    <br /><br />

    <table>
        <tr>
            <td>ID</td>
            <td>Post ID</td>
            <td>Name</td>
            <td>E-mail</td>
            <td>Message</td>
            <td>Date</td>
            <td class="td-modifier">&Eacute;diter</td>
            <td class="td-supprimer">Supprimer</td>
        </tr>
    <?php
        while ($comment = $comments->fetch()) {
    ?>
        <tr>
            <td><?= $comment['id'] ?></td>
            <td><?= $comment['post_id'] ?></td>
            <td><?= $comment['comment_name'] ?></td>
            <td><?= $comment['comment_email'] ?></td>
            <td><?= $comment['comment_content'] ?></td>
            <td><?= $comment['comment_date'] ?></td>
            <td class="td-modifier"><a href='?action=editerCommentaire&id=<?= $comment['id'] ?>'><i class='far fa-edit'></i></a></td>
            <td class="td-supprimer"><i class='far fa-trash-alt' onclick="deleteCommentaire(<?= $comment['id'] ?>)"></i></td>
        </tr>
    <?php
        }
    ?>
    </table>

    <?php
        if (isset($_GET['action']) && $_GET['action'] === "newCommentaire") {
    ?>
    <div id="form-new-comment">
        <br />
        <h1>Nouveau commentaire</h1>
            <form action="?action=newCommentaireSave" method="post" id="form-new-email" name="form-new-email">
                <input type="text" id="post_id" name="post_id" placeholder="POST ID" class="input-demi-largeur" />
                <input type="text" id="name" name="name" placeholder="NOM" class="input-demi-largeur" />
                <input type="text" id="email" name="email" placeholder="E-MAIL" class="input-demi-largeur" />
                <input type="date" id="date" name="date" class="input-demi-largeur" />
                <textarea id="content" name="content" placeholder="MESSAGE"></textarea>
                <input type="submit" value="Ajouter ce commentaire" class="btn-insert-submit" />
            </form>
        </div>
        <br /><br />
    <?php
        }
        else {
    ?>
    <br />
    <a href="?action=newCommentaire#form-new-comment">&#x21E8; Nouveau commentaire</a>
    <br /><br /><br />
    <?php
        }
    ?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>