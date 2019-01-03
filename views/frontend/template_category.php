<div class="grid-container">
<?php
echo '<div class="see-more-title category">Category : ' . $category . "</div>";
while ($data = $posts->fetch())
{
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
?>
</div>