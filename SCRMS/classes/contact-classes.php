<?php

class Contact extends DBHandler
{

    protected function printContacts($user_id) // prints the contact cards by user_id depending on the logged-in user
    {
        $contacts = $this->getUserContacts($user_id);

        foreach ($contacts as $contact) {
            ?>
            <div class=contact>
                <div class=contact-left>
                    <div class=contact-image>
                        <?php if ($contact['image'] == "") {
                            ?>
                            <img src="./images/avatar.jpg" max-height=50px max-width=100px> <?php } else {
                            ?>
                            <img src="<?php echo $contact['image'];
                        } ?>">
                    </div>
                    <div class=contact-left-info>
                        <div class=contact-field>
                            <?php echo $contact['email'] ?>
                        </div>
                        <div class=contact-field>
                            <?php echo $contact['number'] ?>
                        </div>
                    </div>
                </div>
                <div class=contact-info>
                    <div class=contact-field> ID:
                        <?php echo $contact['contact_id'] ?>
                    </div>
                    <div class=contact-field>
                        <?php echo $contact['name'] ?>
                    </div>
                    <div class=contact-field> Workplace:
                        <?php echo $contact['workplace'] ?>
                    </div>
                    <div class=contact-field> Position:
                        <?php echo $contact['position'] ?>
                    </div>

                </div>
            </div>
            <?php
        }
    }

    protected function getUserContacts($user_id) // gets the list of contacts for the logged-in user
    {

        $user = $this->checkUser($user_id);
        $contacts = $this->getContacts($user);

        return $contacts;

    }

    private function checkUser($user_id) // checks if the user exists in the database
    {
        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE user_id = ?;');

        if (!$stmt->execute(array($user_id))) {
            $stmt = null;
            header("location: ./?error=stmtfailed");
            exit();
        }

        if ($stmt->columnCount() == 0) {
            $stmt = null;
            header("location: ./?error=usernfound");
            exit();
        }

        $userData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = null;

        return $userData[0]['user_id'];
    }

    private function getUserCompany($user_id) // gets the company of the logged-in user
    {
        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE user_id = ?;');

        if (!$stmt->execute(array($user_id))) {
            $stmt = null;
            header("location: ./?error=stmtfailed");
            exit();
        }

        if ($stmt->columnCount() == 0) {
            $stmt = null;
            header("location: ./?error=usernotfound");
            exit();
        }

        $userData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = null;

        return $userData[0]['company_name'];
    }

    private function getContacts($user_id) // gets the full list of contacts' info for the logged-in user
    {
        $stmt = $this->connect()->prepare('SELECT DISTINCT c.contact_id, c.name, c.email, 
        c.lead, c.company, c.workplace, c.position, c.number, c.image 
        FROM users u, contacts c WHERE ? = c.lead ORDER BY c.contact_id');

        if (!$stmt->execute(array($user_id))) {
            $stmt = null;
            header("location: ./?error=stmtfailed");
            exit();
        }

        if ($stmt->columnCount() == 0) {
            $stmt = null;
            header("location: ./?error=nocontactsfound");
            exit();
        }

        $contacts = $stmt->fetchall(PDO::FETCH_ASSOC);

        $stmt = null;

        return $contacts;
    }

    protected function addContact($name, $email, $user_id, $work, $pos, $nr, $img) // used to add a contact into the contacts table
    {
        $company = $this->getUserCompany($user_id);

        $stmt = $this->connect()->prepare('INSERT INTO `contacts`(`name`, `email`, `lead`, `company`, `workplace`, `position`, `number`, `image`)
                                           VALUES (?, ?, ?, ?, ?, ?, ?, ?)');

        if (!$stmt->execute(array($name, $email, $user_id, $company, $work, $pos, $nr, $img))) {
            $stmt = null;
            header("location: ./?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ./?error=usernotfound");
            exit();
        }

        $stmt = null;

        return;
    }

    protected function searchContact($contact_id, $user_id) // used to search for a contact among the contacts of the current user
    {
        $stmt = $this->connect()->prepare('SELECT * FROM contacts WHERE contact_id = ? AND lead = ?');

        if (!$stmt->execute(array($contact_id, $user_id))) {
            $stmt = null;
            header("location: ./?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ./?error=contactnotfound");
            exit();
        }

        $contact = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt = null;

        return $contact;

    }

    protected function updateContact($contact_id, $name, $email, $user_id, $work, $pos, $nr, $img) // used to update a contact depending on user specifications
    {
        $stmt = $this->connect()->prepare('UPDATE `contacts` SET `name` = ?, `email` = ?, `workplace` = ?, `position` = ?, `number` = ?, `image` = ?  WHERE `contact_id` = ? AND `lead` = ?');

        if (!$stmt->execute(array($name, $email, $work, $pos, $nr, $img, $contact_id, $user_id))) {
            $stmt = null;
            header("location: ./updateContact.php?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ./updateContact.php?error=nochangesmade");
            exit();
        }

        $stmt = null;

    }

    protected function deleteContact($contact_id, $user_id) // deletes the contact with the user-specified ID
    {
        $stmt = $this->connect()->prepare('DELETE FROM contacts WHERE contact_id = ? AND lead = ?');

        if (!$stmt->execute(array($contact_id, $user_id))) {
            $stmt = null;
            header("location: ../deleteContact.php?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../deleteContact.php?error=contactnotfound");
            exit();
        }

        $stmt = null;

        return;

    }

}

?>