<?php $title = "Minimo Admin - Articles"; ?>

<?php ob_start(); ?>
<div class="grid-container">
	<h1>Article - suppression</h1>

    <?php
        if ($resu) {
    ?>
        <p>L'article a bien été effacé.</p>
    <?php
        }
        else {
    ?>
        <p>Erreur : l'article n'a pas été effacé.</p>
    <?php
        }
    ?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>