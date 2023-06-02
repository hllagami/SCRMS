<?php

class DBHandler { // connects to the database

    // connect to the database
    protected function connect() {
        try {
            $username = "root";
            $password = "";
            $dbh = new PDO('mysql:host=localhost;dbname=scrms', $username, $password);
            return $dbh;
        }
        catch (PDOException $e) {
            print "Error: ". $e->getMessage(). "<br/>";
            die();
        }
    }
}