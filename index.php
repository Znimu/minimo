<?php
require('controllers/frontend.php');

if (isset($_GET['action'])) {
	$action = $_GET['action'];
	if ($action === "accueil") { // Accueil
		get2Posts();
	}
	elseif ($action === "page" || $action === "contact") { // Page
		get3PostsMore($action);
	}
	elseif ($action === "article") { // Article
		if (isset($_GET['id']))
			get1Post(intval($_GET['id']));
		else
			header('Location: index.php?action=accueil');
	}
	elseif ($action === "categorie") { // Categorie
		if (isset($_GET['cat'])) {
			listPostsCategory($_GET['cat']);
		}
		else {
			header('Location: index.php?action=accueil');
		}
	}
	elseif ($action === "newContact") { // Enregistrement d'un message de contact
		$erreur = "";
		if (!isset($_POST['contact_name']) || $_POST['contact_name'] === "")
			$erreur = "Nom vide";
		elseif (!isset($_POST['contact_email']) || $_POST['contact_email'] === "")
			$erreur = "E-mail vide";
		elseif (!isset($_POST['contact_message']) || $_POST['contact_message'] === "")
			$erreur = "Message vide";

		newContact("new contact", $erreur);
	}
	else {
		header('Location: index.php?action=accueil');
	}
}
else {
	header('Location: index.php?action=accueil');
}