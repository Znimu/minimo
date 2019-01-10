<?php $title = "Minimo Admin - E-mails"; ?>

<?php ob_start(); ?>
<div class="grid-container">
	<h1>E-mails - édition</h1>

    <?php
        if ($email = $email->fetch()) {
    ?>
        <form action="?action=modifierEmail" method="post" id="form-editer-email" name="form-editer-email">
            <input type="hidden" id="id" name="id" value="<?= $email['id'] ?>" />
            <input type="text" id="email" name="email" value="<?= $email['newsletter_email'] ?>" placeholder="E-MAIL" />
            <input type="submit" value="Modifier cet e-mail" class="btn-modify-submit" />
        </form>
    <?php
        }
    ?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>