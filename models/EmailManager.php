<?php

namespace Minimo\Models;

require_once("Manager.php");

class EmailManager extends Manager
{
    public function newEmail($email)
    {
        $db = $this->dbConnect();
        $sql = 'INSERT INTO newsletter (newsletter_email)
                VALUES (?)';
        $email_resu = $db->prepare($sql);
        $req = $email_resu->execute(array($email));

        return $req;
    }
}