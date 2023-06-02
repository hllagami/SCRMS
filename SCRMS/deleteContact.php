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

<!-- body start -->

<body>

    <!-- Begin page -->
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
                            <img src="./images/avatar.jpg">
                        </div>
                        <div class=contact-left-info></div>
                    </div>
                    <div class=contact-info>
                        <form action="./includes/deleteContact-inc.php" method=POST>
                            <div class=contact-field></div>
                            <div class=contact-field></div>
                            <div class=contact-field></div>
                            <div class=contact-field>
                                <input type=text name=contact_id placeholder="Delete ID:" maxlength=11>
                            </div>
                            <div class=contact-field></div>
                            <div class=contact-field></div>
                            <br><br><br><br>
                                <input style="display:none" class=sub-button id=confirm-delete type=submit name=submit value="Confirm">
                        </form>
                        <button class=sub-button id="confirm-button" onclick=confirm()>Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirm() {
            document.getElementById('confirm-button').style.display = "none";
            document.getElementById('confirm-delete').style.display = "inline";
        }
    </script>

</body>

</html>