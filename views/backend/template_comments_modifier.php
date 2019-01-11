<?php $title = "Minimo Admin - Commentaires"; ?>

<?php ob_start(); ?>
<div class="grid-container">
	<h1>Commentaires - édition</h1>

    <?php
        if ($resu) {
    ?>
        <p>Le commentaire a bien été modifié.</p>
    <?php
        }
        else {
    ?>
        <p>Erreur : le commentaire n'a pas été modifié.</p>
    <?php
        }
    ?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>