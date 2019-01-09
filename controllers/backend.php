<?php
require_once('models/EmailManager.php');
require_once('models/ContactManager.php');
require_once('models/ArticleManager.php');
require_once('models/ImageManager.php');
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
    $articles = $articleManager->getPosts("article");

    $userManager = new Minimo\Models\UserManager();
    $authors = $userManager->getUsers();

    require('views/backend/template_articles.php');
}

function getArticle($id) {
    $articleManager = new Minimo\Models\ArticleManager();
    $article = $articleManager->getPost($id);

    $userManager = new Minimo\Models\UserManager();
    $authors = $userManager->getUsers();

    require('views/backend/template_articles_editer.php');
}

function updateArticle($id, $author, $date, $content, $title, $status, $name, $category) {
    $articleManager = new Minimo\Models\ArticleManager();
    $resu = $articleManager->updatePost($id, $author, $date, $content, $title, $status, $name, $category);

    require('views/backend/template_articles_modifier.php');
}

function newArticle($author, $date, $content, $title, $status, $name, $category) {
    $articleManager = new Minimo\Models\ArticleManager();
    $newArticle = $articleManager->newArticle($author, $date, $content, $title, $status, $name, $category);
    
    if (!$newArticle)
        echo "Erreur : nouvel article non enregistré.";
    else
        header("Location: ?action=articles");
}

function deleteArticle($id) {
    $articleManager = new Minimo\Models\ArticleManager();
    $resu = $articleManager->deletePost($id);

    require('views/backend/template_articles_effacer.php');
}

// IMAGES
function getImages() {
    $imageManager = new Minimo\Models\ImageManager();
    $images = $imageManager->getPosts("file");

    $userManager = new Minimo\Models\UserManager();
    $authors = $userManager->getUsers();

    require('views/backend/template_images.php');
}

function getImage($id) {
    $imageManager = new Minimo\Models\ImageManager();
    $image = $imageManager->getPost($id);

    $userManager = new Minimo\Models\UserManager();
    $authors = $userManager->getUsers();

    require('views/backend/template_images_editer.php');
}

function updateImage($id, $author, $title, $status, $name) {
    $imageManager = new Minimo\Models\ImageManager();
    $date = "1000-01-01";
    $content = "";
    $category = "";
    $resu = $imageManager->updatePost($id, $author, $date, $content, $title, $status, $name, $category);

    require('views/backend/template_images_modifier.php');
}

function newImage($author, $title, $status, $name) {
    $imageManager = new Minimo\Models\ImageManager();
    $newImage = $imageManager->newImage($author, $title, $status, $name);
    
    if (!$newImage)
        echo "Erreur : nouvelle image non enregistré.";
    else
        header("Location: ?action=images");
}

function deleteImage($id) {
    $imageManager = new Minimo\Models\ImageManager();
    $resu = $imageManager->deletePost($id);

    require('views/backend/template_images_effacer.php');
}