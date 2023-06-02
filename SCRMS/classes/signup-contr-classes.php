<?php

class SignupContr extends Signup {

    private $fullname;
    private $companyname;
    private $signupEmail;
    private $password;
    private $repPass;

    public function __construct($fullname, $companyname, $signupEmail, $password, $repPass) {
        $this->fullname = $fullname;
        $this->companyname = $companyname;
        $this->signupEmail = $signupEmail;
        $this->password = $password;
        $this->repPass = $repPass;
    }

    public function signupUser() { // signs up the user, checks the data's validity
        if($this->emptyInput() == false) {
            header("location: ../index.php?error=emptyInput");
            exit();
        }
        if($this->invalidEmail() == false) {
            header("location: ../index.php?error=email");
            exit();
        }
        if($this->pwdMatch() == false) {
            header("location: ../index.php?error=passMatch");
            exit();
        }
        if($this->usernameTaken() == false) {
            header("location: ../index.php?error=usertaken");
            exit();
        }

        $this->setUser($this->fullname, $this->companyname, $this->signupEmail, $this->password);
    }

    private function emptyInput() { // checks if the input is empty
        if (empty($this->fullname) || empty($this->companyname) || empty($this->signupEmail) || empty($this->password) || empty($this->repPass)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    private function invalidEmail() { // checks if the email is valid
        if (!filter_var($this->signupEmail, FILTER_VALIDATE_EMAIL)){
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    private function pwdMatch() { // checks if the passwords match (pass and repeated pass)
        if ($this->password !== $this->repPass){
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    private function usernameTaken() { // checks if the username is taken
        if (!$this->checkUser($this->fullname, $this->signupEmail)){
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }
}