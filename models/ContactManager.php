<?php

namespace Minimo\Models;

require_once("Manager.php");

class ContactManager extends Manager
{
    public function getContacts()
    {
        $db = $this->dbConnect();
        $sql = 'SELECT *
                FROM contact
                ORDER BY id';
        $contacts = $db->query($sql);

        return $contacts;
    }

    public function getContact($id)
    {
        $db = $this->dbConnect();
        $sql = 'SELECT *
                FROM contact
                WHERE id = ' . $id;
        $contact = $db->query($sql);

        return $contact;
    }

    public function modifierContact($id, $name, $email, $message, $date) {
        $db = $this->dbConnect();
        $sql = 'UPDATE contact
                SET contact_name = "' . $name . '",
                    contact_email = "' . $email . '",
                    contact_message = "' . $message . '",
                    contact_date = "' . $date . '"
                WHERE id = ' . $id;
        $contact = $db->query($sql);

        return $contact;
    }

    public function newContact($name, $email, $message, $date)
    {
        $db = $this->dbConnect();
        $sql = 'INSERT INTO contact(contact_name, contact_email, contact_message, contact_date)
                VALUES(?, ?, ?, ?)';
        $contact = $db->prepare($sql);
        $affectedLines = $contact->execute(array($name, $email, $message, $date));

        return $affectedLines;
    }

    public function effacerContact($id) {
        $db = $this->dbConnect();
        $sql = 'DELETE FROM contact
                WHERE id = ' . $id;
        $contact = $db->query($sql);

        return $contact;
    }
}