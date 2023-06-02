<?php

class Signup extends DBHandler { // sets a new user 

    protected function setUser($username, $companyName, $email, $password){
        $stmt = $this->connect()->prepare('INSERT INTO users (user_name, company_name, email, password)
        VALUES (?, ?, ?, ?);');

        $hashedPass = password_hash($password, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($username, $companyName, $email, $hashedPass))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    protected function checkUser($username, $email) {
        $stmt = $this->connect()->prepare("SELECT user_name FROM users WHERE user_name = ? OR email = ?;");

        if(!$stmt->execute(array($username, $email))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount()>0){
            return false;
        }
        return true;
    }

}