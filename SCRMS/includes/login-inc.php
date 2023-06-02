<?php
// a form's action: logs in as the specified user
if(isset($_POST["submit"])){

    // Grabbing the data
    $email = $_POST["loginEmail"];
    $password = $_POST["loginPassword"];


    // Instantiate LoginContr class
    include("../classes/dbhandler-classes.php");
    include("../classes/login-classes.php");
    include("../classes/login-contr-classes.php");
    $login = new LoginContr($email, $password);

    // Running error handlers and user signup
    $login->loginUser();

    // Going back to front page
    header("location: ../index.php?error=none");
}