<?php
session_start();
if (empty($_SESSION["user_name"])) {
    header("location:./index.php?error=nologin");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>SCRMS - Contacts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://icon-library.com/images/crm-icon/crm-icon-6.jpg">
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/contacts.css">
    <link rel="stylesheet" href="./css/contact-options.css">
</head>

<body>

    <?php
    include("./classes/dbhandler-classes.php");
    include("./classes/contact-classes.php");
    include("./classes/contact-contr-classes.php");
    ?>
    <div class=navbar>
        <ul>
            <li><a href="index.php">SCRMS</a></li>
            <li><a href="#">Lead Management</a></li>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="contacts.php">Contacts</a></li>

            <?php # Navbar showing Username and Log out
            if (isset($_SESSION["user_id"])) {
                ?>
                <li style="float:right"><a href="includes/logout-inc.php">Log Out</a></li>
                <li style="float:right"><a href="./profile.php">
                        <?php echo $_SESSION["user_name"]; ?>
                    </a></li>
                <?php
            } else {
                ?>
                <li style="float:right"><a href="./index.php">Log In</a></li>
                <li style="float:right"><a href="./index.php">Sign Up</a></li>
                <?php
            }
            ?>
        </ul>
    </div>

    <div class=wrapper-flex>
        <div class="contact-options">
            <a class=contact-opt href="./addContact.php">Add Contact</a>
            <a class=contact-opt href="./searchContact.php">Search Contact</a>
            <a class=contact-opt href="./updateContact.php">Update Contact</a>
            <a class=contact-opt href="./deleteContact.php">Delete Contact</a>
        </div>
        <div class="contact-wrapper">
            <div class=contact-list>
                <div class=contact>
                    <div class=contact-left>
                        <div class=contact-image>
                            <img src="./images/avatar.jpg" max-height=50px max-width=100px>
                        </div>
                        <div class=contact-left-info></div>
                    </div>
                    <div class=contact-info>
                        <form action=./includes/addContact-inc.php method=POST>
                            <div class=contact-field>
                                <input type=text name=image placeholder=ImageUrl maxlength=500>
                            </div>
                            <div class=contact-field>
                                <input type=text name=name placeholder=Name* maxlength=50 required>
                            </div>
                            <div class=contact-field>
                                <input type=text name=workplace placeholder=Workplace maxlength=100>
                            </div>
                            <div class=contact-field>
                                <input type=text name=position placeholder=Position maxlength=100>
                            </div>
                            <div class=contact-field>
                                <input type=text name=email placeholder=contact@email.com maxlength=100>
                            </div>
                            <div class=contact-field>
                                <input type=text name=number placeholder="Phone Number" maxlength=20>
                            </div>
                            <input class=sub-button type=submit name=submit value="Add">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>