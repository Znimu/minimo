<?php
require_once('models/EmailManager.php');
require_once('models/ContactManager.php');
require_once('models/ArticleManager.php');
require_once('models/UserManager.php');

// NEWSLETTER EMAILS
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

// CONTACTS
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

// ARTICLES
function getArticles() {
    $articleManager = new Minimo\Models\ArticleManager();
    $articles = $articleManager->getArticles();

    $userManager = new Minimo\Models\UserManager();
    $authors = $userManager->getUsers();

    require('views/backend/template_articles.php');
}

function getArticle($id) {
    $articleManager = new Minimo\Models\ArticleManager();
    $article = $articleManager->getArticle($id);

    $userManager = new Minimo\Models\UserManager();
    $authors = $userManager->getUsers();

    require('views/backend/template_articles_editer.php');
}

function modifierArticle($id, $author, $date, $content, $title, $status, $name, $category) {
    $articleManager = new Minimo\Models\ArticleManager();
    $resu = $articleManager->modifierArticle($id, $author, $date, $content, $title, $status, $name, $category);

    require('views/backend/template_articles_modifier.php');
}

function newArticle($author, $date, $content, $title, $status, $name, $category) {
    $articleManager = new Minimo\Models\ArticleManager();
    $newArticle = $articleManager->newArticle($author, $date, $content, $title, $status, $name, $category);
    //$articles = $articleManager->getArticles();

    if (!$newArticle)
        echo "Erreur : nouvel article non enregistré.";
    else
        header("Location: ?action=articles");
}

function effacerArticle($id) {
    $articleManager = new Minimo\Models\ArticleManager();
    $resu = $articleManager->effacerArticle($id);

    require('views/backend/template_articles_effacer.php');
}