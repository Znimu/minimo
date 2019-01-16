
<br>

<div class="grid-container">
	<div class="grid-x grid-margin-x">
		<div class="medium-12 cell">
			<img class="img-top" src="public/img/<?= $postSticky['image_name'] ?>" />
		</div>

		<?php
			if (isset($_SESSION['edition'])) {  // MODE EDITION
		?>
		<div class="medium-12 cell">
			<form method="post" id="form-edition-article" name="form-edition-article" action="?action=article&id=<?= $postSticky['article_id'] ?>">
				<input id="edition-article-id" type="hidden" class="edition-input-category" value="<?= $postSticky['article_id'] ?>" />
				<div class="edition-label">Category</div>
				<input id="edition-article-category" class="edition-input-category" value="<?= $postSticky['article_category'] ?>" />

				<h1>
					<div class="edition-label">Title</div>
					<input id="edition-article-title" class="edition-input-title" value="<?= $postSticky['article_title'] ?>" />
				</h1>

				<div class="edition-label">Content</div>
				<textarea id="edition-article-content" class="edition-textarea-content"><?= $postSticky['article_content'] ?></textarea>
				<input id="mode-edition-submit" type="button" class="comment-btn-submit" value="Enregistrer les modifications" />
			</form>
		</div>
		<?php
			}
			else { // CONNECTE EN ADMIN OU PAS CONNECTE
		?>
		<div class="medium-12 cell">
			<a><?= $postSticky['article_category'] ?></a>
			<h1><?= $postSticky['article_title'] ?></h1>
			<?php
				if (isset($_SESSION['user'])) { // CONNECTE EN ADMIN
			?>
				
                <span class="h1-admin-liens">
                    <i> (admin : 
                    <a href="admin.php?action=editerArticle&id=<?= $postSticky['article_id'] ?>">
                        &#x21E8; Edit
                    </a>
                    - 
                    <a onclick="deleteArticleFE(<?= $postSticky['article_id'] ?>)">
                        &#x21E8; Delete
                    </a>
                    )</i>
                </span>
                <br /><br />
			<?php
				}
			?>
			<p><?= $postSticky['article_content'] ?></p>
			<br />
		</div>
		<?php
			}
		?>
	</div>
</div>