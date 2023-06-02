<?php
// a form's action: signs up a new user
if(isset($_POST["submit"])){

    // Grabbing the data
    $fullname = $_POST["fullname"];
    $companyname = $_POST["companyname"];
    $signupEmail = $_POST["signupEmail"];
    $password = $_POST["password"];
    $repPass = $_POST["repPass"];

    // Instantiate SignupContr class
    include("../classes/dbhandler-classes.php");
    include("../classes/signup-classes.php");
    include("../classes/signup-contr-classes.php");
    $signup = new SignupContr($fullname, $companyname, $signupEmail, $password, $repPass);

    // Running error handlers and user signup
    $signup->signupUser();

    // Going back to front page
    header("location: ../index.php?error=none");
}