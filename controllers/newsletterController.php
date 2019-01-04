<?php
function newEmail($email)
{
    $emailManager = new Minimo\Models\EmailManager();
    $emailManager->newEmail($email);
}

if (!isset($_POST['email']))
    echo "Null";
elseif ($_POST['email'] === "")
    echo "Vide";
else {
    require_once('../models/EmailManager.php');

    newEmail($_POST['email']);

    echo $_POST['email'];
}
?>