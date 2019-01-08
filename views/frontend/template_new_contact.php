
        <div class="grid-container contact">
            <h1>Contact Form - send us a message</h1>

            <br />
<?php
    if ($erreur !== "") {
?>
            <div class="erreur-new-contact">
                <?= "<p class='erreur-p-centered'>Une erreur a été rencontrée : " . $erreur . ".<br />Votre message n'a pas été enregistré.</p>" ?>
                
                <br />
                
                <a class="retour-contact-form-link" href="?action=contact">Retour au formulaire de contact</a>
            </div>
<?php
    }
    else {
?>
            <div class="valid-new-contact">
                <?= "<p class='erreur-p-centered'>Merci " . $_POST['contact_name'] . ",<br />Votre message a bien été enregistré.</p>" ?>
            </div>
<?php
    }
?>
        </div>
<?php
    require('template_more_articles.php');