<?php $title = "Minimo Admin - Articles"; ?>

<?php ob_start(); ?>
<div class="grid-container">
	<h1>Articles - édition</h1>

    <?php
        if ($article = $article->fetch()) {
    ?>
        <form action="?action=modifierArticle" method="post" id="form-editer-article" name="form-editer-article">
            <input type="hidden" id="id" name="id" value="<?= $article['article_id'] ?>" />
            <select id="author" name="author">
                <?php
                    while ($author = $authors->fetch()) {
                        $date = $article['article_date_fr'];
                ?>
                    <option value="<?= $author['id'] ?>" 
                        <?= $article['article_author'] === $author['id'] ? "selected" : "" ?>>
                        <?= $author['user_login'] ?>
                    </option>
                <?php
                    }
                ?>
            </select>
            <input type="date" id="date" name="date" value="<?= $date ?>" />
            <textarea id="content" name="content" placeholder="MESSAGE"><?= $article['article_content'] ?></textarea>
            <input type="text" id="title" name="title" value="<?= $article['article_title'] ?>" placeholder="TITLE" />
            <input type="text" id="status" name="status" value="<?= $article['article_status'] ?>" placeholder="STATUS" />
            <input type="text" id="name" name="name" value="<?= $article['article_name'] ?>" placeholder="NAME" />
            <input type="text" id="category" name="category" value="<?= $article['article_category'] ?>" placeholder="CATEGORY" />
            <select id="image" name="image">
                    <option value="0">(no image linked)</option>
                <?php
                    while ($image = $images->fetch()) {
                ?>
                    <option value="<?= $image['post_id'] ?>"
                        <?= $image['post_id'] === $article['image_id'] ? "selected" : "" ?>>
                        <?= $image['post_title'] . " - " . $image['post_name'] ?>
                    </option>
                <?php
                    }
                ?>
            </select>
            <input type="submit" value="Modifier cet article" />
        </form>
        <br /><br /><br />
    <?php
        }
    ?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>