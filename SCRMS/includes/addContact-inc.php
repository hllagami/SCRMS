<?php
// a form's action: adds a contact to the logged-in user's list
if(isset($_POST["submit"])) {

    session_start();

    // Grabbing the data
    
    $name = $_POST["name"];
    $email = $_POST["email"];
    $lead = $_SESSION["user_id"];
    $workplace = $_POST["workplace"];
    # company will be taken from users table based on user_id
    $position = $_POST["position"];
    $number = $_POST["number"];
    $image = $_POST["image"];


    // Instantiate ContactHandler class
    include("../classes/dbhandler-classes.php");
    include("../classes/contact-classes.php");
    include("../classes/contact-handler-classes.php");
    $contacter = new ContactHandler(null, $name, $email, $lead, $workplace, $position, $number, $image);

    // Running error handlers and user signup
    $contacter->add();

    // Going back to contacts page
    header("location: ../contacts.php?error=none");

}