<?php

class Login extends DBHandler // used to login the user
{

    protected function getUser($email, $password) // gets the user, checks if the password is valid
    {
        $stmt = $this->connect()->prepare('SELECT password FROM users WHERE email = ?;'); // gets the correct hashedpass

        if (!$stmt->execute(array($email))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../index.php?error=usernotfound");
            exit();
        }
        
        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($password, $pwdHashed[0]["password"]); // checks if the password entered matches the hashedpass

        if(!$checkPwd){
            $stmt = null;
            header("location: ../index.php?error=wrongpassword");
            exit();
        }
        else if($checkPwd) {
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE email = ? AND password = ?;'); // gets the user's data to log them in
            
            if(!$stmt->execute(array($email, $pwdHashed[0]["password"]))) {
                $stmt = null;
                header("location: ../index.php?error=usernotfound");
                exit();
            }

            if($stmt->rowCount() == 0){
                $stmt = null;
                header("location: ../index.php?error=usernotfound");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start(); // essentially logs in the user, stores their id and name as session variables
            $_SESSION["user_id"] = $user[0]["user_id"];
            $_SESSION["user_name"] = $user[0]["user_name"];
        }
        
        $stmt = null;
       
    }
}