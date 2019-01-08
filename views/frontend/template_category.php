<div class="grid-container category-container">
<?php
$nb_articles = 0;
echo '<div class="see-more-title category">Category : ' . $category . "</div>";

while ($nb_articles < $posts->rowCount()) {
    if ($nb_articles % 2 === 0)
        echo '<div class="grid-container">
                <div class="grid-x grid-margin-x cell">';
    require('template_tiny_article.php');
    if ($nb_articles % 2 === 1)
        echo "</div></div>";
    
    $nb_articles++;
}
if ($nb_articles % 2 === 1)
    echo "</div></div>";

$posts->closeCursor();
if ($nb_articles === 0)
    echo "<p>Aucun article trouvé dans cette catégorie.</p>";
?>
</div>