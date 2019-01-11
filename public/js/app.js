//$(document).foundation();

$(document).ready(function() {
    // NEWSLETTER
    function newsletterSubscribe() {
        var email = $('#newEmail').val();
    
        $.ajax({
            method: "POST",
            url: "controllers/ajax/newsletterController.php",
            data: { email: email }
        })
        .done(function(msg) {
            $('#newEmail').val("");
            alert("E-mail ajouté pour la newsletter : " + msg);
        })
        .fail(function(msg) {
          alert("Error : " + msg);
        });
    }

    $('#btnNewEmail').on("click", function() {
        newsletterSubscribe();
    });

    $('#formNewEmail').submit(function(e) {
        e.preventDefault();
        var key = e.which;

        newsletterSubscribe();
    });

    // AJOUT 2 ARTICLES
    var nb_articles_affiches = 2;
    $('#button-load').on("click", function() {
        $.ajax({
            method: "POST",
            url: "controllers/ajax/ajout2Articles.php",
            data: {
                nb_articles_affiches: nb_articles_affiches
            }
        })
        .done(function(msg) {
            $('#block-ajout-articles').append(msg);
            nb_articles_affiches += 2;
        })
        .fail(function(msg) {
          alert("Error : " + msg);
        });
    });

    // AJOUT COMMENTAIRE
    function addComment() {
        var post_id = $('#post_id').val();
        var comment_name = $('#comment_name').val();
        var comment_email = $('#comment_email').val();
        var comment = $('#comment_comment').val();
    
        $.ajax({
            method: "POST",
            url: "controllers/ajax/commentController.php",
            data: {
                postId: post_id,
                name: comment_name,
                email: comment_email,
                comment: comment
            }
        })
        .done(function(msg) {
            $('#comment_name').val("");
            $('#comment_email').val("");
            $('#comment_comment').val("");

            if (msg === "Post ID vide" || msg === "Nom vide" || msg === "Email vide" || msg === "Commentaire vide")
                alert("Commentaire non ajouté : " + msg);
            else
                $('#comments').append(msg);
        })
        .fail(function(msg) {
          alert("Error : " + msg.responseText);
        });
    }

    $('#comment-btn-submit').on("click", function() {
        addComment();
    });

    $('#formNewComment').submit(function(e) {
        e.preventDefault();
        var key = e.which;

        addComment();
    });
});


// ADMIN

// EMAILS
function deleteEmail(id) {
    if (confirm("Voulez-vous vraiment effacer cet e-mail ?"))
        window.location = "?action=effacerEmail&id=" + id;
}

// CONTACTS
function deleteContact(id) {
    if (confirm("Voulez-vous vraiment effacer ce contact ?"))
        window.location = "?action=effacerContact&id=" + id;
}

// ARTICLES
function deleteArticle(id) {
    if (confirm("Voulez-vous vraiment effacer cet article ?"))
        window.location = "?action=effacerArticle&id=" + id;
}

// IMAGES
function deleteImage(id) {
    if (confirm("Voulez-vous vraiment effacer cette image ?"))
        window.location = "?action=effacerImage&id=" + id;
}

// COMMENTAIRES
function deleteCommentaire(id) {
    if (confirm("Voulez-vous vraiment effacer ce commentaire ?"))
        window.location = "?action=effacerCommentaire&id=" + id;
}