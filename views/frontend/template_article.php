<?php $title = "Minimo - " . $post0['article_title']; ?>

<?php ob_start(); ?>
    <br>

    
    <div class="grid-container">
        <div class="grid-x grid-margin-x">
            <div class="medium-12 cell">
                <img class="img-top" src="public/img/01_image_principale.png" />
            </div>
        
            <div class="medium-9 cell">
                <img class="img-top" src="public/img/<?= $post0['image_name'] ?>" />

                <a href="?action=categorie&cat=<?= $post0['article_category'] ?>"><?= $post0['article_category'] ?></a>
                <h1><?= $post0['article_title'] ?></h1>
                <p><?= $post0['article_content'] ?></p>
                
                <div class="share">SHARE 
                    <i class="fab fa-facebook-f"></i> 
                    <i class="fab fa-google-plus-g"></i> 
                    <i class="fab fa-pinterest"></i>
                </div>
            </div>
            <div class="medium-3 cell"><!-- SIDE BLOCK -->
                <img class="sidebar-img" src="public/img/09_me.png" />
                <h1>About me</h1>
                <p>Haec et huius modi quaedam innumerabilia ultrix facinorum impiorum bonorumque praemiatrix aliquotiens operatur Adrastia atque utinam semper.</p>
                <ul class="menu">
                    <li class="share_me">
                        <i class="fab fa-facebook-f"></i> 
                        <i class="fab fa-google-plus-g"></i> 
                        <i class="fab fa-pinterest"></i>
                    </li>
                </ul>
                <a class="top-post" href="#">Top posts</a>
                <?php
                    while ($topPost = $topPosts->fetch()) {
                ?>
                <ul>
                    <li>
                        <a href="?action=article&id=<?= $topPost['post_id'] ?>">
                            <h3 class="side-block-title"><?= $topPost['post_title'] ?></h3>
                            <span class="side-block-nb-comment"><?= $topPost['nb_comments'] ?> comments</span>
                        </a>
                    </li>
                </ul>
                <?php
                    }
                ?>

                <img class="article-pub" src="public/img/Pub.png" />
            </div>
        </div>
    </div>

    <?php require('template_more_articles.php'); ?>

    
    <div class="grid-container">
        <div id="comments" class="comments">
            <div class="grid-x grid-margin-x">
                <div class="medium-12 cell">
                    <div class="see-more-title" href="#">2 comments</div>
                </div>
            </div>
            
            <?php
                while ($comment = $comments->fetch()) {
                    require "template_comment.php";
                }
            ?>
        </div>

        <div class="comments-form">
            <div class="grid-x grid-margin-x">
                <div class="medium-1 cell">
                    <img class="comment-img" src="public/img/upload/Avatar01.png" />
                </div>
                <div class="medium-11 cell">
                    <form id="formNewComment" name="formNewComment" action="?action=newComment" method="post">
                        <input type="hidden" id="post_id" name="post_id" value="<?= $post['id'] ?>" />
                        <input class="comment-input" id="comment_name" name="comment_name" placeholder="NAME" />
                        <input class="comment-input" id="comment_email" name="comment_email" placeholder="E-MAIL" />
                        <br /><br />
                        <textarea class="comment-textarea" placeholder="JOIN THE DISCUSSION" id="comment_comment" name="comment_comment"></textarea>
                        <input id="comment-btn-submit" class="comment-btn-submit" type="buttom" value="Send this comment" />
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
