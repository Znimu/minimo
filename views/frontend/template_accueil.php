<?php $title = "Minimo - Home"; ?>

<?php ob_start(); ?>
<?php require('template_main_article.php'); ?>

<div class="grid-container main-container">
	<div class="grid-x grid-margin-x">
		<?php
			require('template_tiny_article.php');
			require('template_tiny_article.php');
		?>
	</div>
</div>

<div class="block-newsletter">
	<div class="grid-container">
		<div class="grid-x grid-margin-x">
		<div class="medium-3 cell">&nbsp;</div>
		<div class="medium-6 cell">
			<h1 class="centred newsletter-title">Sign up for our newsletter !</h1>
			<form id="formNewEmail" name="formNeWEmail" action="#" method="post">
				<input id="newEmail" name="newEmail" class="input-newsletter" type="text" placeholder="Enter a valid email adress" />
				<input id="btnNewEmail" type="button" value="+" class="btn-submit-newEmail" />
			</form>
		</div>
		<div class="medium-3 cell"></div>
		</div>
	</div>
</div>

<div id="block-ajout-articles"></div>

<div class="grid-container">
	<div class="grid-x grid-margin-x">
		<div class="medium-5 cell">&nbsp;</div>
		<div class="medium-2 cell">
			<input type="button" id="button-load" class="button-load" value="Load more" />
		</div>
		<div class="medium-5 cell">&nbsp;</div>
	</div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>