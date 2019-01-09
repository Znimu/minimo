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

    public function exists($login, $password)
    {
        $db = $this->dbConnect();
        $sql = 'SELECT *
                FROM users
                WHERE user_login = ?
                AND user_pass = ?';
        $user = $db->prepare($sql);
        $req = $user->execute(array($login, $password));

        return $req;
    }
}