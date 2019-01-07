<?php $title = "Minimo - Page"; ?>

<?php ob_start(); ?>

<?php
if ($action === "categorie") {
    require('template_category.php');
}
else {
    require('template_main_article.php');
?>

<div class="grid-container share">
    <span class="caps">Share </span>
    <i class="fab fa-facebook-f"></i> 
    <i class="fab fa-twitter"></i> 
    <i class="fab fa-google-plus-g"></i> 
    <i class="fab fa-linkedin-in"></i> 
    <i class="fab fa-pinterest"></i>
</div>

<?php require('template_more_articles.php'); ?>
<?php } ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>