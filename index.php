<?php
require('controllers/frontend.php');

if (isset($_GET['action'])) {
	if ($_GET['action'] === "accueil") { // Accueil
		get2Posts();
	}
	elseif ($_GET['action'] === "page") {// Page
		$action = $_GET['action'];
		require "views/frontend/template_page.php";
	}
	elseif ($_GET['action'] === "article") { // Article
		if (isset($_GET['id']))
			getPost($_GET['id']);
		else
			header('Location: index.php?action=accueil');
	}
	elseif ($_GET['action'] === "categorie") {
		if (isset($_GET['cat'])) { // Categorie
			listPostsCategory($_GET['cat']);
		}
		else {
			header('Location: index.php?action=accueil');
		}
	}
	elseif ($_GET['action'] === "newComment") { // New Comment
		echo "New comment !";
	}
	elseif ($_GET['action'] === "newEmail") {
		newEmail($_POST['newEmail']);
	}
}
else {
	header('Location: index.php?action=accueil');
}