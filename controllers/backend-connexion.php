<?php
// CONNEXION
function connexion($login, $password) {
    $userManager = new Minimo\Models\UserManager();
    return $userManager->exists($login, $password);
}

function connexionForm() {
    require('views/backend/template_connexion.php');
}