<?php $title = "Minimo Admin - E-mails"; ?>

<?php ob_start(); ?>
<div class="grid-container">
	<h1>E-mails - suppression</h1>

    <?php
        if ($resu) {
    ?>
        <p>L'e-mail a bien été effacé.</p>
    <?php
        }
        else {
    ?>
        <p>Erreur : l'e-mail n'a pas été effacé.</p>
    <?php
        }
    ?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>