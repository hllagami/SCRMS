<?php

class Profile extends DBHandler { // handles the operations regarding the user's profile

    protected function getUserData($id) { // gets the data for the current user
        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE user_id = ?;');

        if (!$stmt->execute(array($id))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../index.php?error=usernotfound");
            exit();
        }
        
        // get all database column values as an array: $data[0][col-name]
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }

    protected function updateUserData($id, $image, $name, $email, $number, $company, $position) { // updates the current user's data
        $stmt = $this->connect()->prepare('UPDATE `users` SET `user_name` = ?, `email` = ?, `number` = ?, `company_name` = ?, `position` = ?, `image` = ?
        WHERE `user_id` = ?;');

        if (!$stmt->execute(array($name, $email, $number, $company, $position, $image, $id))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ./profile.php?error=nochangesmade");
            exit();
        }
    }
}