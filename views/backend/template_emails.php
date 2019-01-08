<?php $title = "Minimo Admin - E-mails"; ?>

<?php ob_start(); ?>
<div class="grid-container">
	<h1> E-mails (newsletter)</h1>

    <table>
        <tr>
            <td>ID</td>
            <td>E-mail</td>
            <td class="td-modifier">&Eacute;diter</td>
            <td class="td-supprimer">Supprimer</td>
        </tr>
    <?php
        while ($email = $emails->fetch()) {
    ?>
        <tr>
            <td><?= $email['id'] ?></td>
            <td><?= $email['newsletter_email'] ?></td>
            <td class="td-modifier"><a href='?action=editerEmail&id=<?= $email['id'] ?>'><i class='far fa-edit'></i></a></td>
            <td class="td-supprimer"><i class='far fa-trash-alt' onclick="deleteEmail(<?= $email['id'] ?>)"></i></td>
        </tr>
    <?php
        }
    ?>
    </table>

    <?php
        if (isset($_GET['action']) && $_GET['action'] === "newEmail") {
    ?>
        <form action="?action=newEmailSave" method="post" id="form-new-email" name="form-new-email">
            <input type="text" id="email" name="email" placeholder="E-MAIL" />
            <input type="submit" value="Ajouter cet e-mail" />
        </form>
    <?php
        }
        else {
    ?>
    <a href="?action=newEmail">Nouvel e-mail</a>
    <?php
        }
    ?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>