<?php
require('controllers/backend.php');

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
            header("Location: admin.php?action=contacts");
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
            effacerArticle($_GET['id']);
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
            modifierArticle($_POST['id'], $_POST['author'], $_POST['date'], $_POST['content'],
                            $_POST['title'], $_POST['status'], $_POST['name'], $_POST['category']);
        }
    }
}