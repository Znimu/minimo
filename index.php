<?php
require('controllers/frontend.php');

if (isset($_GET['action'])) {
	if ($_GET['action'] === "accueil") { // Accueil
		//require "views/frontend/template_accueil.php";
		get2Posts();
	}
	elseif ($_GET['action'] === "page") // Page
		require "views/frontend/template_page.php";
	elseif ($_GET['action'] === "article") { // Article
		//require "views/frontend/template_article.php";
		getPost($_GET['id']);
	}
	elseif ($_GET['action'] === "categorie" && isset($_GET['cat'])) { // Categorie
		listPostsCategory($_GET['cat']);
	}
}