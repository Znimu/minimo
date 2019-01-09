<?php

namespace Minimo\Models;

require_once("Manager.php");

class UserManager extends Manager
{
    public function getUsers()
    {
        $db = $this->dbConnect();
        $sql = 'SELECT *
                FROM users';
        $req = $db->query($sql);

        return $req;
    }
}