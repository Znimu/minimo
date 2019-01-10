<?php $title = "Minimo Admin - E-mails"; ?>

<?php ob_start(); ?>
<div class="grid-container">
	<h1>E-mails - édition</h1>

    <?php
        if ($contact = $contact->fetch()) {
    ?>
        <form action="?action=modifierContact" method="post" id="form-editer-contact" name="form-editer-contact">
            <input type="hidden" id="id" name="id" value="<?= $contact['id'] ?>" />
            <input type="text" id="name" name="name" value="<?= $contact['contact_name'] ?>" placeholder="NOM" />
            <input type="text" id="email" name="email" value="<?= $contact['contact_email'] ?>" placeholder="E-MAIL" />
            <input type="date" id="date" name="date" value="<?= $contact['contact_date'] ?>" />
            <textarea id="message" name="message" placeholder="MESSAGE"><?= $contact['contact_message'] ?></textarea>
            <input type="submit" value="Modifier ce contact" class="btn-modify-submit" />
        </form>
    <?php
        }
    ?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>