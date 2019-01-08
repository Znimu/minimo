<?php
require_once('models/EmailManager.php');
require_once('models/ContactManager.php');

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

function getContacts() {
    $contactManager = new Minimo\Models\ContactManager();
    $contacts = $contactManager->getContacts();

    require('views/backend/template_contacts.php');
}

function getContact($id) {
    $contactManager = new Minimo\Models\ContactManager();
    $contact = $contactManager->getContact($id);

    require('views/backend/template_contacts_editer.php');
}

function modifierContact($id, $name, $email, $message, $date) {
    $contactManager = new Minimo\Models\ContactManager();
    $resu = $contactManager->modifierContact($id, $name, $email, $message, $date);

    require('views/backend/template_contacts_modifier.php');
}

function newContact($name, $email, $message, $date) {
    $contactManager = new Minimo\Models\ContactManager();
    $newContact = $contactManager->newContact($name, $email, $message, $date);
    $contacts = $contactManager->getContacts();

    header("Location: ?action=contacts");
}

function effacerContact($id) {
    $contactManager = new Minimo\Models\ContactManager();
    $resu = $contactManager->effacerContact($id);

    require('views/backend/template_contacts_effacer.php');
}