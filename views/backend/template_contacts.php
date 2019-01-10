<?php $title = "Minimo Admin - Contacts"; ?>

<?php ob_start(); ?>
<div class="grid-container">
	<h1>Contacts</h1>
    <a href="?action=newContact#form-new-contact">&#x21E8; Nouveau contact</a>
    <br /><br />

    <table>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>E-mail</td>
            <td>Message</td>
            <td>Date</td>
            <td class="td-modifier">&Eacute;diter</td>
            <td class="td-supprimer">Supprimer</td>
        </tr>
    <?php
        while ($contact = $contacts->fetch()) {
    ?>
        <tr>
            <td><?= $contact['id'] ?></td>
            <td><?= $contact['contact_name'] ?></td>
            <td><?= $contact['contact_email'] ?></td>
            <td><?= $contact['contact_message'] ?></td>
            <td><?= $contact['contact_date'] ?></td>
            <td class="td-modifier"><a href='?action=editerContact&id=<?= $contact['id'] ?>'><i class='far fa-edit'></i></a></td>
            <td class="td-supprimer"><i class='far fa-trash-alt' onclick="deleteContact(<?= $contact['id'] ?>)"></i></td>
        </tr>
    <?php
        }
    ?>
    </table>

    <?php
        if (isset($_GET['action']) && $_GET['action'] === "newContact") {
    ?>
    <div id="form-new-contact">
        <br />
        <h1>Nouveau contact</h1>
            <form action="?action=newContactSave" method="post" id="form-new-email" name="form-new-email">
                <input type="text" id="name" name="name" placeholder="NOM" />
                <input type="text" id="email" name="email" placeholder="E-MAIL" />
                <input type="date" id="date" name="date" />
                <textarea id="message" name="message" placeholder="MESSAGE"></textarea>
                <input type="submit" value="Ajouter ce contact" class="btn-insert-submit" />
            </form>
        </div>
        <br /><br />
    <?php
        }
        else {
    ?>
    <br />
    <a href="?action=newContact#form-new-contact">&#x21E8; Nouveau contact</a>
    <br /><br /><br />
    <?php
        }
    ?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>