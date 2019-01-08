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

    public function getEmails() {
        $db = $this->dbConnect();
        $sql = 'SELECT *
                FROM newsletter';
        $emails = $db->query($sql);

        return $emails;
    }

    public function getEmail($id) {
        $db = $this->dbConnect();
        $sql = 'SELECT *
                FROM newsletter
                WHERE id = ' . $id;
        $email = $db->query($sql);

        return $email;
    }

    public function modifierEmail($id, $email) {
        $db = $this->dbConnect();
        $sql = 'UPDATE newsletter
                SET newsletter_email = "' . $email . '"
                WHERE id = ' . $id;
        $email = $db->query($sql);

        return $email;
    }

    public function effacerEmail($id) {
        $db = $this->dbConnect();
        $sql = 'DELETE FROM newsletter
                WHERE id = ' . $id;
        $email = $db->query($sql);

        return $email;
    }
}