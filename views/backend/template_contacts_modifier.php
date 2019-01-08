<?php $title = "Minimo Admin - Contacts"; ?>

<?php ob_start(); ?>
<div class="grid-container">
	<h1>Contacts - édition</h1>

    <?php
        if ($resu) {
    ?>
        <p>Le contact a bien été modifié.</p>
    <?php
        }
        else {
    ?>
        <p>Erreur : le contact n'a pas été modifié.</p>
    <?php
        }
    ?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>