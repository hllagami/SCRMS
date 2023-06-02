<?php
// a form's action: deletes a contact from the logged-in user's list
if(isset($_POST["submit"])) {

    session_start();

    // Grabbing the data
    $contact = $_POST["contact_id"];
    $lead = $_SESSION["user_id"];

    // Instantiate ContactHandler class
    include("../classes/dbhandler-classes.php");
    include("../classes/contact-classes.php");
    include("../classes/contact-handler-classes.php");
    $contacter = new ContactHandler($contact, null, null, $lead);

    // Running error handlers and user signup
    $contacter->delete();

    // Going back to contacts page
    header("location: ../contacts.php?error=contact".$contact."deleted");

}