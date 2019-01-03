<?php
if (isset($_GET['action'])) {
  if ($_GET['action'] === "accueil")
    require "views/template_accueil.php";
  elseif ($_GET['action'] === "page")
    require "views/template_page.php";
  elseif ($_GET['action'] === "article")
    require "views/template_article.php";
}