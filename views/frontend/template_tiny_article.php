<div class="medium-6 cell">
	<?php
		if ($img1 != false) {
	?>
	<img class="img-demi" src="public/img/<?= $img1['post_name'] ?>" />
	<?php
		}
	?>
	<a class="tiny-article-link-category"><?= $data1['post_category'] ?></a>
	<h1><?= $data1['post_title'] ?></h1>
	<p><?= $data1['post_content'] ?></p>
</div>