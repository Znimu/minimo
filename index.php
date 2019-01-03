<?php
if (isset($_GET['action'])) {
  if ($_GET['action'] === "accueil")
    require "views/frontend/template_accueil.php";
  elseif ($_GET['action'] === "page")
    require "views/frontend/template_page.php";
  elseif ($_GET['action'] === "article")
    require "views/frontend/template_article.php";
}