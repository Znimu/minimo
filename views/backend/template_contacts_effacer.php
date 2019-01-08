<?php $title = "Minimo Admin - Contacts"; ?>

<?php ob_start(); ?>
<div class="grid-container">
	<h1>Contact - suppression</h1>

    <?php
        if ($resu) {
    ?>
        <p>Le contact a bien été effacé.</p>
    <?php
        }
        else {
    ?>
        <p>Erreur : le contact n'a pas été effacé.</p>
    <?php
        }
    ?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>