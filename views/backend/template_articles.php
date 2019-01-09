<?php $title = "Minimo Admin - Articles"; ?>

<?php ob_start(); ?>
<div class="grid-container">
	<h1>Articles</h1>

    <table>
        <tr>
            <td>ID</td>
            <td>Author</td>
            <td>Date</td>
            <td>Content</td>
            <td>Title</td>
            <td>Status</td>
            <td>Name</td>
            <td>Category</td>
            <td class="td-modifier">&Eacute;diter</td>
            <td class="td-supprimer">Supprimer</td>
        </tr>
    <?php
        while ($article = $articles->fetch()) {
            $content = substr($article['post_content'], 0, 400) . '...';
    ?>
        <tr>
            <td><?= $article['post_id'] ?></td>
            <td><?= $article['user_login'] ?></td>
            <td><?= $article['post_date'] ?></td>
            <td><?= $content ?></td>
            <td><?= $article['post_title'] ?></td>
            <td><?= $article['post_status'] ?></td>
            <td><?= $article['post_name'] ?></td>
            <td><?= $article['post_category'] ?></td>
            <td class="td-modifier"><a href='?action=editerArticle&id=<?= $article['post_id'] ?>'><i class='far fa-edit'></i></a></td>
            <td class="td-supprimer"><i class='far fa-trash-alt' onclick="deleteArticle(<?= $article['post_id'] ?>)"></i></td>
        </tr>
    <?php
        }
    ?>
    </table>

    <?php
        if (isset($_GET['action']) && $_GET['action'] === "newArticle") {
    ?>
        <form action="?action=newArticleSave" method="post" id="form-new-article" name="form-new-article">
            <select id="author" name="author">
                <?php
                    while ($author = $authors->fetch()) {
                ?>
                    <option value="<?= $author['id'] ?>"><?= $author['user_login'] ?></option>
                <?php
                    }
                ?>
            </select>
            <input type="date" id="date" name="date" />
            <textarea type="text" id="content" name="content" placeholder="CONTENT"></textarea>
            <input type="text" id="title" name="title" placeholder="TITLE" />
            <input type="text" id="status" name="status" placeholder="STATUS" />
            <input type="text" id="name" name="name" placeholder="NAME" />
            <input type="text" id="category" name="category" placeholder="CATEGORY" />
            <input type="submit" value="Ajouter cet article" />
        </form>
        <br /><br />
    <?php
        }
        else {
    ?>
    <a href="?action=newArticle">Nouvel article</a>
    <br /><br /><br />
    <?php
        }
    ?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>