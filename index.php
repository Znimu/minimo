<?php
require('controllers/frontend.php');

if (isset($_GET['action'])) {
  if ($_GET['action'] === "home") // Accueil
    require "views/frontend/template_accueil.php";
  elseif ($_GET['action'] === "page") // Page
    require "views/frontend/template_page.php";
  elseif ($_GET['action'] === "post") // Article
    require "views/frontend/template_article.php";
  elseif ($_GET['action'] === "category" && isset($_GET['cat'])) { // Categories
    $category = $_GET['cat'];
    listPostsCategory($category);
  }
}