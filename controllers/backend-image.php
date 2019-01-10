<?php
function getImages() {
    $imageManager = new Minimo\Models\ImageManager();
    $images = $imageManager->getPosts("file");
    $imageFiles = $imageManager->getFiles();

    $userManager = new Minimo\Models\UserManager();
    $authors = $userManager->getUsers();

    require('views/backend/template_images.php');
}

function getImage($id) {
    $imageManager = new Minimo\Models\ImageManager();
    $image = $imageManager->getPost($id);
    $imageFiles = $imageManager->getFiles();

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