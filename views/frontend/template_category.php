<div class="grid-container category-container">
<?php
$nb_articles = 0;
echo '<div class="see-more-title category">Category : ' . $category . "</div>";

while (isset($data[$nb_articles])) {
    if ($nb_articles % 2 === 0)
        echo '<div class="grid-container">
                <div class="grid-x grid-margin-x cell">';
    $data1 = $data[$nb_articles];
    $img1 = $img[$nb_articles];
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