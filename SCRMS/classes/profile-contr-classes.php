<?php

class ProfileContr extends Profile { // enables the profile page to display user data

    private $id;

    public function __construct($id) {
        $this->id = $id;
    }

    public function profileUser() { // gets the user's data to display it on their profile
        if($this->emptyInput() == false) {
            header("location: ../index.php?error=emptyInput");
            exit();
        }
        
        return $this->getUserData($this->id);
    }

    private function emptyInput() { // checks for empty input (in case user is not logged in)
        if (empty($this->id)) {
            return false;
        }
        return true;
    }

    public function updateprofile($image, $name, $email, $number, $company, $position) { //updates the user's profile data
        if($this->emptyInput() == false) {
            header("location: ../index.php?error=emptyInput");
            exit();
        }

        $this->updateUserData($this->id, $image, $name, $email, $number, $company, $position);
    }

}