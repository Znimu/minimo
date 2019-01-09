<?php $title = "Minimo Admin - Images"; ?>

<?php ob_start(); ?>
<div class="grid-container">
	<h1>Image - suppression</h1>

    <?php
        if ($resu) {
    ?>
        <p>L'image a bien été effacé.</p>
    <?php
        }
        else {
    ?>
        <p>Erreur : l'image n'a pas été effacé.</p>
    <?php
        }
    ?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>