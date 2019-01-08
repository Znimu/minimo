<?php $title = "Minimo Admin - E-mails"; ?>

<?php ob_start(); ?>
<div class="grid-container">
	<h1> E-mails - édition</h1>

    <?php
        if ($email) {
    ?>
        <p>L'e-mail a bien été modifié.</p>
    <?php
        }
        else {
    ?>
        <p>Erreur : l'e-mail n'a pas été modifié.</p>
    <?php
        }
    ?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>