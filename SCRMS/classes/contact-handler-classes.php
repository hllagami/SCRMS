<?php

class ContactHandler extends Contact { // adds deletes and updates contacts
    private $contact_id;
    private $name;
    private $email;
    private $lead;
    private $workplace;
    private $position;
    private $number;
    private $image;

    public function __construct($id = null, $name = null, $e = null, $l = null, $w = null, $p = null, $n = null, $i = null) {
        $this->contact_id = $id;
        $this->name = $name;
        $this->email = $e;
        $this->lead = $l;
        $this->workplace = $w;
        $this->position = $p;
        $this->number = $n;
        $this->image = $i;
    }

    public function add() { // add a contact to the logged-in user
        $this->addContact($this->name, $this->email, $this->lead,
                        $this->workplace, $this->position, 
                        $this->number, $this->image);
    }

    public function delete() { // delete a contact of the logged-in user
        $this->deleteContact($this->contact_id, $this->lead);
    }

    public function update() { // update a contact of the logged-in user
        $this->updateContact($this->contact_id, $this->name, $this->email, $this->lead,
        $this->workplace, $this->position, 
        $this->number, $this->image);

        header("location:./updateContact.php?error=none");
    }

}