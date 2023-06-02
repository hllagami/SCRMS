<?php

class ContactContr extends Contact // prints and searches contacts
{
    private $user_id;

    public function __construct($user_id)
    {
        $this->user_id = $user_id;
    }

    public function print() // public call to printContacts
    {
        $this->printContacts($this->user_id);
    }

    public function searchById($value) // searches contact by contact ID 
    {
        $stmt = $this->connect()->prepare('SELECT * FROM contacts WHERE contact_id = ? AND `lead` = ?');
        if (!$stmt->execute(array($value, $this->user_id))) {
            $stmt = null;
            header("location: ./?error=stmtfailed");
            exit();
        }

        if ($stmt->columnCount() == 0) {
            $stmt = null;
            header("location: ./?error=contactnotfound");
            exit();
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchByName($value) // searches contact by contact name
    {
        $stmt = $this->connect()->prepare('SELECT * FROM contacts WHERE `name` LIKE ? AND `lead` = ?');
        if (!$stmt->execute(array($value, $this->user_id))) {
            $stmt = null;
            header("location: ./?error=stmtfailed");
            exit();
        }

        if ($stmt->columnCount() == 0) {
            $stmt = null;
            header("location: ./?error=contactnotfound");
            exit();
        }
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

}