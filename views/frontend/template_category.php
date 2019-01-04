<div class="grid-container">
<?php
$nb_articles = 0;
echo '<div class="see-more-title category">Category : ' . $category . "</div>";
while ($data = $posts->fetch())
{
    $nb_articles++;
?>
    <div class="news">
        <h3>
            <a class="" href="?action=post&post=<?= htmlspecialchars($data['id']) ?>">
                <h3><?= htmlspecialchars($data['post_title']) ?></h3>
            </a>
        </h3>
    </div>
<?php
}
$posts->closeCursor();
if ($nb_articles === 0)
    echo "<p>Aucun article trouvé dans cette catégorie.</p>";
?>
</div>