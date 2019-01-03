<?php $title = "Minimo - Home"; ?>

<?php ob_start(); ?>
<?php require('template_main_article.php'); ?>

<div class="grid-container">
	<div class="grid-x grid-margin-x">
		<div class="medium-6 cell">
			<img class="img-demi" src="public/img/02_festival.png" />
			<a class="tiny-article-link-category">Lifestyle</a>
			<h1>More than just a music festival</h1>
			<p>Haec et huius modi quaedam et huius modi quaedam et huius modi quaedam innumerabilia ultrix facinorum innumerabilia ultrix facinorum impiorum bonorumque praemiatrix aliquotiens.</p>
		</div>

		<div class="medium-6 cell">
			<img class="img-demi" src="public/img/03_caffee.png" />
			<a class="tiny-article-link-category">Lifestyle</a>
			<h1>Life tastes better with coffee</h1>
			<p>Haec et huius modi et huius modi quaedam quaedam innumerabilia et huius modi quaedam ultrix facinorum innumerabilia ultrix facinorum impiorum bonorumque praemiatrix aliquotiens.</p>
		</div>
	</div>

	<div class="grid-x grid-margin-x">
		<div class="medium-6 cell">
			<img class="img-demi" src="public/img/04_pont.png" />
			<a class="tiny-article-link-category">Lifestyle</a>
			<h1>American dream</h1>
			<p>Haec et huius modi quaedam et huius modi quaedam et huius modi quaedam innumerabilia ultrix facinorum innumerabilia ultrix facinorum impiorum bonorumque praemiatrix aliquotiens.</p>
		</div>

		<div class="medium-6 cell">
			<img class="img-demi" src="public/img/05_montagnes.png" />
			<a class="tiny-article-link-category">Lifestyle</a>
			<h1>A day exploring the Alps</h1>
			<p>Haec et huius modi et huius modi quaedam quaedam innumerabilia et huius modi quaedam ultrix facinorum innumerabilia ultrix facinorum impiorum bonorumque praemiatrix aliquotiens.</p>
		</div>
	</div>
</div>

<div class="block-newsletter">
	<div class="grid-container">
		<div class="grid-x grid-margin-x">
		<div class="medium-3 cell">&nbsp;</div>
		<div class="medium-6 cell">
			<h1 class="centred newsletter-title">Sign up for our newsletter !</h1>
			<input class="input-newsletter" type="text" placeholder="Enter a valid email adress" />
		</div>
		<div class="medium-3 cell"></div>
		</div>
	</div>
</div>

<div class="grid-container">
	<div class="grid-x grid-margin-x">
		<div class="medium-6 cell">
			<img class="img-demi" src="public/img/06_girl.png" />
			<a>Lifestyle</a>
			<h1>Top 10 songs for running</h1>
			<p>Haec et huius modi quaedam et huius modi quaedam et huius modi quaedam innumerabilia ultrix facinorum innumerabilia ultrix facinorum impiorum bonorumque praemiatrix aliquotiens.</p>
		</div>

		<div class="medium-6 cell">
			<img class="img-demi" src="public/img/07_route_glace.png" />
			<a>Lifestyle</a>
			<h1>Cold winter days</h1>
			<p>Haec et huius modi et huius modi quaedam quaedam innumerabilia et huius modi quaedam ultrix facinorum innumerabilia ultrix facinorum impiorum bonorumque praemiatrix aliquotiens.</p>
		</div>
	</div>

	<div class="grid-x grid-margin-x">
		<div class="medium-5 cell">&nbsp;</div>
		<div class="medium-2 cell">
			<input type="button" class="button-load" value="Load more" />
		</div>
		<div class="medium-5 cell">&nbsp;</div>
	</div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>