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
		<h1><?= $post['article_title'] ?></h1>
	</a>
	<p><?= $content ?></p>

	<?php
		}
		else
			echo "<br /><br /><br /><p class='articles-tous-affiches'>(tous les articles ont été affichés)</p>";
	?>
</div>