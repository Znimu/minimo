<?php $title = "Minimo Admin - Articles"; ?>

<?php ob_start(); ?>
<div class="grid-container">
	<h1>Articles - édition</h1>

    <?php
        if ($article = $article->fetch()) {
    ?>
        <form action="?action=modifierArticle" method="post" id="form-editer-article" name="form-editer-article">
            <input type="hidden" id="id" name="id" value="<?= $article['id'] ?>" />
            <select id="author" name="author">
                <?php
                    while ($author = $authors->fetch()) {
                        $date = $article['post_date_fr'];
                ?>
                    <option value="<?= $author['id'] ?>" 
                        <?= $article['post_author'] === $author['id'] ? "selected" : "" ?>>
                        <?= $author['user_login'] ?>
                    </option>
                <?php
                    }
                ?>
            </select>
            <input type="date" id="date" name="date" value="<?= $date ?>" />
            <textarea id="content" name="content" placeholder="MESSAGE"><?= $article['post_content'] ?></textarea>
            <input type="text" id="title" name="title" value="<?= $article['post_title'] ?>" placeholder="TITLE" />
            <input type="text" id="status" name="status" value="<?= $article['post_status'] ?>" placeholder="STATUS" />
            <input type="text" id="name" name="name" value="<?= $article['post_name'] ?>" placeholder="NAME" />
            <input type="text" id="category" name="category" value="<?= $article['post_category'] ?>" placeholder="CATEGORY" />
            <input type="submit" value="Modifier cet article" />
        </form>
        <br /><br /><br />
    <?php
        }
    ?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>