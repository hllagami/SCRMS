<?php

if(isset($_POST["submit"])) {

    session_start();

    // Grabbing the data
    
    $SalesId = $_POST["SalesId"];
    $Product = $_POST["Product"];
    $TotalSales = $_SESSION["TotalSales"];

    ////


    // Instantiate ContactHandler class
    include "../classes/dbhandler-classes.php";
    include "../classes/contact-classes.php";
    include "../classes/contact-handler-classes.php";
    $contacter = new ContactHandler(null, $name, $email, $lead, $workplace, $position, $number, $image);

    // Running error handlers and user signup
    $contacter->add();

    // Going back to contacts page
    header("location: ../contacts.php?error=none");

}