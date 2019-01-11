<div class="medium-6 cell">
	<?php
		if ($post = $posts->fetch()) {
	?>
	<img class="img-demi" src="public/img/<?= $post['image_name'] ?>" />
	<?php
		$content = $post['article_content'];
		if (strlen($content) > 400)
			$content = substr($content, 0, 400) . '...';
	?>
	<a class="tiny-article-link-category" href="?action=categorie&cat=<?= $post['article_category'] ?>">
		<?= $post['article_category'] ?>
	</a>
	<a href="?action=article&id=<?= $post['article_id'] ?>">
		<h1>
			<?= $post['article_title'] ?>
		</h1>
	</a>
	<?php
	if (isset($_SESSION['user'])) {
	?>
	<span class="h1-admin-liens2">
		<i> (admin : 
		<a href="admin.php?action=editerArticle&id=<?= $post['article_id'] ?>">
			&#x21E8; Edit
		</a>
		- 
		<a onclick="deleteArticleFE(<?= $post['article_id'] ?>)">
			&#x21E8; Delete
		</a>
		)</i>
	</span>
	<br /><br />
	<?php
		}
	?>
		
	<p><?= $content ?></p>

	<?php
		}
		else
			echo "<br /><br /><br /><p class='articles-tous-affiches'>(tous les articles ont été affichés)</p>";
	?>
</div>