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
</div>