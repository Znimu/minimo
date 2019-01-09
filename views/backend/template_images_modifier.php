<?php $title = "Minimo Admin - Images"; ?>

<?php ob_start(); ?>
<div class="grid-container">
	<h1>Images - édition</h1>

    <?php
        if ($resu) {
    ?>
        <p>L'image a bien été modifié.</p>
    <?php
        }
        else {
    ?>
        <p>Erreur : l'image n'a pas été modifié.</p>
    <?php
        }
    ?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>