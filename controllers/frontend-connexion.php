<?php
// CONNEXION
function connexion($login, $password) {
    $userManager = new Minimo\Models\UserManager();
    $resu = $userManager->exists($login, $password);
    return $resu;
}

function connexionForm() {
    require('views/frontend/template_connexion.php');
}