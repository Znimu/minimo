<?php $title = "Minimo Admin - Images"; ?>

<?php ob_start(); ?>
<div class="grid-container">
	<h1>Images</h1>

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
            <input type="text" id="name" name="name" placeholder="NAME" />
            <input type="submit" value="Ajouter cette image" />
        </form>
        <br /><br />
    <?php
        }
        else {
    ?>
    <a href="?action=newImage">Nouvelle image</a>
    <br /><br /><br />
    <?php
        }
    ?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>