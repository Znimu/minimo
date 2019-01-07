<?php

namespace Minimo\Models;

require_once("Manager.php");

class ContactManager extends Manager
{
    public function getContact()
    {
        $db = $this->dbConnect();
        $sql = 'SELECT *
                FROM contact
                ORDER BY id DESC';
        $contacts = $db->prepare($sql);
        $contacts->execute(array($postId));

        return $contacts;
    }

    public function newContact($name, $email, $message)
    {
        $db = $this->dbConnect();
        $sql = 'INSERT INTO contact(contact_name, contact_email, contact_message, contact_date)
                VALUES(?, ?, ?, NOW())';
        $contacts = $db->prepare($sql);
        $affectedLines = $contacts->execute(array($name, $email, $message));

        return $affectedLines;
    }
}