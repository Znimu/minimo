<?php $title = "Minimo - Page"; ?>

<?php ob_start(); ?>
<?php require('template_main_article.php'); ?>

<div class="row share">
    <div class="medium-1 columns">&nbsp;</div>
    <div class="medium-10 columns">
        <ul class="menu">
            <li class="float-right"><span class="caps">Share </span>
                <i class="fab fa-facebook-f"></i> 
                <i class="fab fa-twitter"></i> 
                <i class="fab fa-google-plus-g"></i> 
                <i class="fab fa-linkedin-in"></i> 
                <i class="fab fa-pinterest"></i>
            </li>
        </ul>
    </div>
    <div class="medium-1 columns">&nbsp;</div>
</div>

<?php require('template_more_articles.php'); ?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>