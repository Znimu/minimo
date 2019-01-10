<?php
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