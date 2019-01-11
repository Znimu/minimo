<div class="grid-x grid-margin-x">
    <div class="medium-1 cell">
        <img class="comment-img" src="public/img/upload/Avatar01.png" />
    </div>
    <div class="medium-11 cell">
        <p>
            <span class="name-bold">
                <?= $comment['comment_name'] ?>
            </span> 
            <span class="comments-date">
                <?= $comment['comment_date'] != 'new' ? "(posté le " . $comment['comment_date'] . ")" : "(new)" ?>
            </span>
            <?php
                if (isset($_SESSION['user'])) {
            ?>
            <br />
            <i> (admin : 
            <a href="admin.php?action=editerCommentaire&id=<?= $comment['id'] ?>">
                &#x21E8; Edit
            </a>
             - 
            <a onclick="deleteCommentaireFE(<?= $comment['id'] ?>)">
                &#x21E8; Delete
            </a>
             )</i>
            <?php
                }
            ?>
        </p>
        <p><?= $comment['comment_content'] ?></p>
        <br /><br />
    </div>
</div>

<!--
<div class="grid-x grid-margin-x">
    <div class="medium-12 cell">
        <a class="comment-reply" href="#">Reply</a>
    </div>
</div>-->