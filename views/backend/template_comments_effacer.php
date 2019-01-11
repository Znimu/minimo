<?php $title = "Minimo Admin - Commentaires"; ?>

<?php ob_start(); ?>
<div class="grid-container">
	<h1>Commentaire - suppression</h1>

    <?php
        if ($resu) {
    ?>
        <p>Le commentaire a bien été effacé.</p>
    <?php
        }
        else {
    ?>
        <p>Erreur : le commentaire n'a pas été effacé.</p>
    <?php
        }
    ?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>