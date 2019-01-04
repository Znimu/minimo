<?php $title = "Minimo - Page"; ?>

<?php ob_start(); ?>
    <br>

    
    <div class="grid-container">
        <div class="grid-x grid-margin-x">
            <div class="medium-12 cell">
                <img class="img-top" src="public/img/01_image_principale.png" />
            </div>
        
            <div class="medium-9 cell">
                <img class="img-top" src="public/img/<?= $img['post_name'] ?>" />

                <a href="?action=categorie&cat=<?= $post['post_category'] ?>"><?= $post['post_category'] ?></a>
                <h1><?= $post['post_title'] ?></h1>
                <p><?= $post['post_content'] ?></p>
                
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
                <ul>
                    <li><a><h3 class="side-block-title">A day exploring the Alps</h3><span class="side-block-nb-comment">24 comments</span></a></li>
                </ul>
                <ul>
                    <li><a><h3 class="side-block-title">American dream</h3><span class="side-block-nb-comment">19 comments</span></a></li>
                </ul>
                <ul>
                    <li><a><h3 class="side-block-title">Cold winter days</h3><span class="side-block-nb-comment">17 comments</span></a></li>
                </ul>

                <img class="article-pub" src="public/img/Pub.png" />
            </div>
        </div>
    </div>

    <?php require('template_more_articles.php'); ?>

    
    <div class="grid-container">
        <div class="comments">
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

            <div class="grid-x grid-margin-x">
                <div class="medium-1 cell">
                    <img class="comment-img" src="public/img/upload/Avatar01.png" />
                </div>
                <div class="medium-11 cell">
                    <textarea class="comment-input" placeholder="JOIN THE DISCUSSION"></textarea>
                </div>
            </div>
        </div>
    </div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
