<?php
require('bootstrap.php');
require('controllers/frontend.php');

if (isset($_GET['action'])) {
	$action = $_GET['action'];

	switch ($action) {
		case "accueil":
			get2Posts();
			break;
			
		case "page":
		case "contact":
			get3PostsMore($action);
			break;
		
		case "article":
			if (isset($_GET['id']))
				get1Post(intval($_GET['id']));
			else
				header('Location: index.php?action=accueil');
			break;
		
		case "categorie":
			if (isset($_GET['cat'])) {
				listPostsCategory($_GET['cat']);
			}
			else {
				header('Location: index.php?action=accueil');
			}
			break;

		case "newContact":
			$erreur = "";
			if (!isset($_POST['contact_name']) || $_POST['contact_name'] === "")
				$erreur = "Nom vide";
			elseif (!isset($_POST['contact_email']) || $_POST['contact_email'] === "")
				$erreur = "E-mail vide";
			elseif (!isset($_POST['contact_message']) || $_POST['contact_message'] === "")
				$erreur = "Message vide";

			newContact("new contact", $erreur);
			break;
		
		default:
			header('Location: index.php?action=accueil');
	}
}
else {
	header('Location: index.php?action=accueil');
}