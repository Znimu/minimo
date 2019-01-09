<?php $title = "Minimo Admin - Articles"; ?>

<?php ob_start(); ?>
<div class="grid-container">
	<h1>Articles - édition</h1>

    <?php
        if ($resu) {
    ?>
        <p>L'article a bien été modifié.</p>
    <?php
        }
        else {
    ?>
        <p>Erreur : l'article n'a pas été modifié.</p>
    <?php
        }
    ?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>