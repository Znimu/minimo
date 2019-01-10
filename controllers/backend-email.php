<?php
function getEmails() {
    $emailManager = new Minimo\Models\EmailManager();
    $emails = $emailManager->getEmails();

    require('views/backend/template_emails.php');
}

function getEmail($id) {
    $emailManager = new Minimo\Models\EmailManager();
    $email = $emailManager->getEmail($id);

    require('views/backend/template_emails_editer.php');
}

function modifierEmail($id, $email) {
    $emailManager = new Minimo\Models\EmailManager();
    $resu = $emailManager->modifierEmail($id, $email);

    require('views/backend/template_emails_modifier.php');
}

function effacerEmail($id) {
    $emailManager = new Minimo\Models\EmailManager();
    $resu = $emailManager->effacerEmail($id);

    require('views/backend/template_emails_effacer.php');
}

function newEmail($email) {
    $emailManager = new Minimo\Models\EmailManager();
    $resu = $emailManager->newEmail($email);

    header("Location: ?action=newsletters");
}