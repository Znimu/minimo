<?php
require('bootstrap.php');
require('controllers/backend.php');
session_start();

if (isset($_GET['action']) && $_GET['action'] === "deconnexion") {
    session_destroy();
    header('Location: admin.php');
    exit();
}
elseif (isset($_POST['login']) && isset($_POST['password'])) {
    if (connexion($_POST['login'], $_POST['password'])) {
        $_SESSION['user'] = $_POST['login'];
    }
    else {
        echo "Mauvais login ou mot de passe";
    }
}

if (isset($_SESSION['user'])){
    $user = $_SESSION['user'];
    if (!isset($_GET['action']))
        $_GET['action'] = "articles";
}

if (!isset($user))
    connexionForm();
else { // On est connecté
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        if ($action === "newsletters" || $action === "newEmail") {
            getEmails();
        }
        // EMAILS NEWSLETTER
        elseif ($action === "editerEmail") {
            if (!isset($_GET['id']) || $_GET['id'] === "")
                header("Location: admin.php?action=newsletters");
            else {
                getEmail($_GET['id']);
            }
        }
        elseif ($action === "modifierEmail") {
            $erreur = "";
            if (!isset($_POST['id']) || $_POST['id'] === "" || !isset($_POST['email']) || $_POST['email'] === "") {
                $erreur = "Paramètre manquant";
                header("Location: admin.php?action=newsletters");
            }
            else {
                modifierEmail($_POST['id'], $_POST['email']);
            }
        }
        elseif ($action === "effacerEmail") {
            $erreur = "";
            if (!isset($_GET['id']) || $_GET['id'] === "") {
                $erreur = "Paramètre manquant";
                header("Location: admin.php?action=newsletters");
            }
            else {
                effacerEmail($_GET['id']);
            }
        }
        elseif ($action === "newEmailSave") {
            if (!isset($_POST['email']) || $_POST['email'] === "") {
                header("Location: admin.php?action=newsletters");
            }
            else {
                newEmail($_POST['email']);
            }
        }
        // CONTACTS
        elseif ($action === "contacts" || $action === "newContact") {
            getContacts();
        }
        elseif ($action === "newContactSave") {
            if (!isset($_POST['name']) || $_POST['name'] === ""
                || !isset($_POST['email']) || $_POST['email'] === ""
                || !isset($_POST['date']) || $_POST['date'] === ""
                || !isset($_POST['message']) || $_POST['message'] === "") {
                echo "Erreur : champ vide";
                //header("Location: admin.php?action=contacts");
            }
            else {
                newContact($_POST['name'], $_POST['email'], $_POST['message'], $_POST['date']);
            }
        }
        elseif ($action === "effacerContact") {
            $erreur = "";
            if (!isset($_GET['id']) || $_GET['id'] === "") {
                $erreur = "Paramètre manquant";
                header("Location: admin.php?action=contacts");
            }
            else {
                effacerContact($_GET['id']);
            }
        }
        elseif ($action === "editerContact") {
            if (!isset($_GET['id']) || $_GET['id'] === "")
                header("Location: admin.php?action=contacts");
            else {
                getContact($_GET['id']);
            }
        }
        elseif ($action === "modifierContact") {
            $erreur = "";
            if (!isset($_POST['id']) || $_POST['id'] === ""
                || !isset($_POST['name']) || $_POST['name'] === ""
                || !isset($_POST['email']) || $_POST['email'] === ""
                || !isset($_POST['date']) || $_POST['date'] === ""
                || !isset($_POST['message']) || $_POST['message'] === "") {
                $erreur = "Paramètre manquant";
                header("Location: admin.php?action=contacts");
            }
            else {
                modifierContact($_POST['id'], $_POST['name'], $_POST['email'], $_POST['message'], $_POST['date']);
            }
        }
        // ARTICLES
        elseif ($action === "articles" || $action === "newArticle") {
            getArticles();
        }
        elseif ($action === "newArticleSave") {
            if (!isset($_POST['author']) || $_POST['author'] === ""
                || !isset($_POST['date']) || $_POST['date'] === ""
                || !isset($_POST['content']) || $_POST['content'] === ""
                || !isset($_POST['title']) || $_POST['title'] === ""
                || !isset($_POST['status']) || $_POST['status'] === ""
                || !isset($_POST['name']) || $_POST['name'] === ""
                || !isset($_POST['category']) || $_POST['category'] === "") {
                //header("Location: admin.php?action=articles");
                echo "Erreur : champ vide !";
            }
            else {
                newArticle($_POST['author'], $_POST['date'], $_POST['content'], $_POST['title'],
                            $_POST['status'], $_POST['name'], $_POST['category']);
            }
        }
        elseif ($action === "effacerArticle") {
            $erreur = "";
            if (!isset($_GET['id']) || $_GET['id'] === "") {
                $erreur = "Paramètre manquant";
                header("Location: admin.php?action=articles");
            }
            else {
                deleteArticle($_GET['id']);
            }
        }
        elseif ($action === "editerArticle") {
            if (!isset($_GET['id']) || $_GET['id'] === "")
                header("Location: admin.php?action=articles");
            else {
                getArticle($_GET['id']);
            }
        }
        elseif ($action === "modifierArticle") {
            $erreur = "";
            if (!isset($_POST['id']) || $_POST['id'] === ""
                || !isset($_POST['author']) || $_POST['author'] === ""
                || !isset($_POST['date']) || $_POST['date'] === ""
                || !isset($_POST['content']) || $_POST['content'] === ""
                || !isset($_POST['title']) || $_POST['title'] === ""
                || !isset($_POST['status']) || $_POST['status'] === ""
                || !isset($_POST['name']) || $_POST['name'] === ""
                || !isset($_POST['category']) || $_POST['category'] === "") {
                $erreur = "Paramètre manquant";
                header("Location: admin.php?action=articles");
            }
            else {
                updateArticle($_POST['id'], $_POST['author'], $_POST['date'], $_POST['content'],
                                $_POST['title'], $_POST['status'], $_POST['name'], $_POST['category']);
            }
        }
        // IMAGES
        elseif ($action === "images" || $action === "newImage") {
            getImages();
        }
        elseif ($action === "newImageSave") {
            if (!isset($_POST['author']) || $_POST['author'] === ""
                || !isset($_POST['title']) || $_POST['title'] === ""
                || !isset($_POST['status']) || $_POST['status'] === ""
                || !isset($_POST['name']) || $_POST['name'] === "") {
                //header("Location: admin.php?action=articles");
                echo "Erreur : champ vide !";
            }
            else {
                newImage($_POST['author'], $_POST['title'],
                            $_POST['status'], $_POST['name']);
            }
        }
        elseif ($action === "effacerImage") {
            $erreur = "";
            if (!isset($_GET['id']) || $_GET['id'] === "") {
                $erreur = "Paramètre manquant";
                header("Location: admin.php?action=images");
            }
            else {
                deleteImage($_GET['id']);
            }
        }
        elseif ($action === "editerImage") {
            if (!isset($_GET['id']) || $_GET['id'] === "")
                header("Location: admin.php?action=images");
            else {
                getImage($_GET['id']);
            }
        }
        elseif ($action === "modifierImage") {
            $erreur = "";
            if (!isset($_POST['id']) || $_POST['id'] === ""
                || !isset($_POST['author']) || $_POST['author'] === ""
                || !isset($_POST['title']) || $_POST['title'] === ""
                || !isset($_POST['status']) || $_POST['status'] === ""
                || !isset($_POST['name']) || $_POST['name'] === "") {
                $erreur = "Paramètre manquant";
                header("Location: admin.php?action=images");
            }
            else {
                updateImage($_POST['id'], $_POST['author'], $_POST['title'], $_POST['status'], $_POST['name']);
            }
        }
    }
    else {
        echo "404 - page not found";
    }
}