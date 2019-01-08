<div class="see-more">
    <div class="grid-container">
        <div class="grid-x grid-margin-x">
            <div class="medium-12 cell">
            <div class="see-more-title" href="#">You may also like</div>
            </div>

            <?php
                for ($i = 0; $i < 3; $i++) {
                    $post = $posts->fetch();
            ?>
            <div class="medium-4 cell">
                <a class="see-more-link" href="?action=article&id=<?= $post['article_id'] ?>">
                    <img class="see-more-img" src="public/img/<?= $post['image_name'] ?>" />
                    <h3><?= $post['article_title'] ?></h3>
                </a>
            </div>
            <?php
                }
            ?>
        </div>
    </div>
</div>