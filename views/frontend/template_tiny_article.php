<div class="medium-6 cell">
	<?php
		$post = $posts->fetch();
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
</div>

<!--
<div class="medium-6 cell">
<?php
		if ($img1 != false) {
	?>
	<img class="img-demi" src="public/img/<?= $img1['post_name'] ?>" />
	<?php
		}
		$content = $data1['post_content'];
		if (strlen($content) > 400)
			$content = substr($content, 0, 400) . '...';
	?>
	<a class="tiny-article-link-category" href="?action=categorie&cat=<?= $data1['post_category'] ?>">
		<?= $data1['post_category'] ?>
	</a>
	<a href="?action=article&id=<?= $data1['id'] ?>">
		<h1><?= $data1['post_title'] ?></h1>
	</a>
	<p><?= $content ?></p>
</div>-->