<?php $title = "Minimo Admin - Images"; ?>

<?php ob_start(); ?>
<div class="grid-container">
	<h1>Images</h1>
    <a href="?action=newImage#form-new-image">&#x21E8; Nouvelle image</a>
    <br /><br />

    <table>
        <tr>
            <td>ID</td>
            <td>Author</td>
            <td>Title</td>
            <td>Status</td>
            <td>Name</td>
            <td class="td-modifier">&Eacute;diter</td>
            <td class="td-supprimer">Supprimer</td>
        </tr>
    <?php
        while ($image = $images->fetch()) {
    ?>
        <tr>
            <td><?= $image['post_id'] ?></td>
            <td><?= $image['user_login'] ?></td>
            <td><?= $image['post_title'] ?></td>
            <td><?= $image['post_status'] ?></td>
            <td><?= $image['post_name'] ?></td>
            <td class="td-modifier"><a href='?action=editerImage&id=<?= $image['post_id'] ?>'><i class='far fa-edit'></i></a></td>
            <td class="td-supprimer"><i class='far fa-trash-alt' onclick="deleteImage(<?= $image['post_id'] ?>)"></i></td>
        </tr>
    <?php
        }
    ?>
    </table>

    <?php
        if (isset($_GET['action']) && $_GET['action'] === "newImage") {
    ?>
        <div id="form-new-image">
            <br />
            <h1>Nouvelle image</h1>
            <form action="?action=newImageSave" method="post" id="form-new-image" name="form-new-image">
                <select id="author" name="author">
                    <?php
                        while ($author = $authors->fetch()) {
                    ?>
                        <option value="<?= $author['id'] ?>"><?= $author['user_login'] ?></option>
                    <?php
                        }
                    ?>
                </select>
                <input type="text" id="title" name="title" placeholder="TITLE" />
                <input type="text" id="status" name="status" placeholder="STATUS" />
                <select id="name" name="name">
                    <?php
                        foreach ($imageFiles as $value) {
                    ?>
                        <option value="<?= $value ?>"><?= $value ?></option>
                    <?php
                        }
                    ?>
                </select>
                <input type="submit" value="Ajouter cette image" class="btn-insert-submit" />
            </form>
        </div>
        <br /><br />
    <?php
        }
        else {
    ?>
    <br />
    <a href="?action=newImage#form-new-image">&#x21E8; Nouvelle image</a>
    <br /><br /><br />
    <?php
        }
    ?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>