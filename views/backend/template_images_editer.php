<?php $title = "Minimo Admin - Images"; ?>

<?php ob_start(); ?>
<div class="grid-container">
	<h1>Images - édition</h1>

    <?php
        if ($image = $image->fetch()) {
    ?>
        <form action="?action=modifierImage" method="post" id="form-editer-image" name="form-editer-image">
            <input type="hidden" id="id" name="id" value="<?= $image['id'] ?>" class="input-demi-largeur" />
            <select id="author" name="author" class="input-demi-largeur">
                <?php
                    while ($author = $authors->fetch()) {
                        $date = $image['post_date_fr'];
                ?>
                    <option value="<?= $author['id'] ?>" 
                        <?= $image['post_author'] === $author['id'] ? "selected" : "" ?>>
                        <?= $author['user_login'] ?>
                    </option>
                <?php
                    }
                ?>
            </select>
            <input type="text" id="title" name="title" value="<?= $image['post_title'] ?>" placeholder="TITLE" class="input-demi-largeur" />
            <input type="text" id="status" name="status" value="<?= $image['post_status'] ?>" placeholder="STATUS" class="input-demi-largeur" />
            <select id="name" name="name" class="input-demi-largeur">
                <?php
                    foreach ($imageFiles as $value) {
                ?>
                    <option value="<?= $value ?>"
                        <?= $value === $image['post_name'] ? "selected" : "" ?>>
                        <?= $value ?>
                    </option>
                <?php
                    }
                ?>
            </select>
            <input type="submit" value="Modifier cette image" class="btn-modify-submit" />
        </form>
        <br /><br /><br />
    <?php
        }
    ?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>