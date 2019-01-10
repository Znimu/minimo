<?php
function uploadForm() {
    require('views/backend/template_upload.php');
}

function newFile() {
    $imageManager = new Minimo\Models\ImageManager();
    $name = 'newFile';
    $destination = "public/img/" . $_FILES['newFile']['name'];
    $maxsize = 99999999;

    $resu = $imageManager->uploadFile($name, $destination, $maxsize, array('png','gif','jpg','jpeg'));

    if ($resu !== false) {
        $erreur = "";
    }
    else {
        $erreur = "Erreur d'upload : le fichier n'a pas été uploadé.";
    }

    require('views/backend/template_upload_save.php');
}