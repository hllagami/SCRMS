<?php
session_start();

include("./classes/dbhandler-classes.php");
include("./classes/contact-classes.php");
include("./classes/contact-contr-classes.php");
include("./classes/contact-handler-classes.php");

if (empty($_SESSION["user_name"])) {
    header("location:./index.php?error=nologin");
}

$contactDetails = '';

if (isset($_POST['submit'])) {
    if (!empty($_POST['contact-id'])) {
        $contact = new ContactContr($_SESSION["user_id"]);
        $contactDetails = $contact->searchById($_POST['contact-id']);
    }
}

if (isset($_POST['update'])) {
    $contactHandler = new ContactHandler($_POST["contact_id"], $_POST["name"], $_POST["email"], $_SESSION['user_id'], $_POST["work"], $_POST["pos"], $_POST["number"], $_POST["image"]);

    $contactHandler->update();
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

    <!-- Navbar Start -->
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
    <!-- Navbar End -->

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
                        <form action=#search method=POST>
                            <div class=contact-field><br><br><br></div>
                            <div class=contact-field>
                                <input type=number name=contact-id placeholder="Search Contact ID to Update" required>
                            </div>
                            <br><br><br>
                            <input class=sub-button type=submit name=submit value="Search">
                        </form>
                    </div>
                </div>

            <?php if (!$contactDetails) { // if no contact is found ?>
                <div class=contact>
                    <div class=contact-left>
                        <div class=contact-image>
                            <img src="./images/avatar.jpg" max-height=50px max-width=100px>
                        </div>
                        <div class=contact-left-info>
                            <div class=contact-field></div>
                            <div class=contact-field></div>
                        </div>
                    </div>
                    <div class=contact-info>
                        <div class=contact-field></div>
                        <div class=contact-field></div>
                        <div class=contact-field></div>
                        <div class=contact-field></div>
                        <?php // prints a message saying ID was not found
                        if (isset($_POST['submit'])) {
                            if (!empty($_POST['contact-id']))
                                echo "ID: " . $_POST['contact-id']." not found";
                            else
                                echo "No Contact ID Specified"; }
                        ?>
                    </div>
                </div>
            
            <?php } else if (!isset($_POST['update'])) {
                        foreach ($contactDetails as $contact) { ?>
                <div class=contact>
                    <div class=contact-left>
                        <div class=contact-image>
                            <img src="./images/avatar.jpg">
                        </div>
                        <div class=contact-left-info></div>
                    </div>
                    <div class=contact-info>
                        <form action=#update method=POST>
                            <div class=contact-field>
                            <?php if ($contact['image'] == "") { ?>
                                <input type=text name=image placeholder=ImageURL value="./images/avatar.jpg">
                            <?php } else { ?>
                                <input type=text name=image placeholder=ImageURL value="<?php echo $contact['image'];?>" maxlength=500>
                            <?php } ?>
                            </div>
                            <div class=contact-field>
                                <input type=text name=contact_id value="<?php echo $contact['contact_id'] ?>" readonly>
                            </div>
                            <div class=contact-field>
                                <input type=text name=name value="<?php echo $contact['name'] ?>" maxlength=50 required>
                            </div>
                            <div class=contact-field>
                                <input type=text name=work value="<?php echo $contact['workplace'] ?>" maxlength=100>
                            </div>
                            <div class=contact-field>
                                <input type=text name=pos value="<?php echo $contact['position'] ?>" maxlength=100>
                            </div>
                            <div class=contact-field>
                                <input type=email name=email value="<?php echo $contact['email'] ?>" maxlength=100>
                            </div>
                            <div class=contact-field>
                                <input type=text name=number value="<?php echo $contact['number'] ?>" maxlength=20>
                            </div>
                            <input style="margin-top:0px" class=sub-button type=submit name=update value="Update">
                        </form>
                    </div>
                </div>
                
            <?php if (isset($_POST['update'])) { // if the update button is clicked ?>
                <div class=contact>
                    <div class=contact-left>
                        <div class=contact-image>
                            <img src="./images/avatar.jpg" max-height=50px max-width=100px>
                        </div>
                        <div class=contact-left-info>
                            <div class=contact-field></div>
                            <div class=contact-field></div>
                        </div>
                    </div>
                    <div class=contact-info>
                        <div class=contact-field></div>
                        <div class=contact-field>
                            Update Successful
                        </div>
                        <div class=contact-field></div>
                        <div class=contact-field></div>
                    </div>
                </div>
            <?php } } } ?>   
            </div>
        </div>
</body>

</html>