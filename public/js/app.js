//$(document).foundation();

$(document).ready(function() {
    function newsletterSubscribe() {
        var email = $('#newEmail').val();
    
        $.ajax({
            method: "POST",
            url: "controllers/newsletterController.php",
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
});