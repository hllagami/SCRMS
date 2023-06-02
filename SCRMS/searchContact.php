<?php
session_start();

include("./classes/dbhandler-classes.php");
include("./classes/contact-classes.php");
include("./classes/contact-contr-classes.php");

if (empty($_SESSION["user_name"])) {
    header("location:./index.php?error=nologin");
}

$contactDetails = '';

if (isset($_POST['submit'])) {
    if (!empty($_POST['search-by'])) {
        $contact = new ContactContr($_SESSION["user_id"]);
        if ($_POST['search-by'] === "id") {
            $contactDetails = $contact->searchById($_POST['search-value']);

        } else if ($_POST['search-by'] === "name") {
            $contactDetails = $contact->searchByName($_POST['search-value']);
        }
    }
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

    <style>

        .contact-field>select {
            color: #f2f2f2;
            width: 100%;
            background-color: #b23149;
            border-radius: 20px;
        }

    </style>

</head>

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
                        <form action=# method=POST>
                            <div class=contact-field>
                                <label for="search-by">Search By:</label>
                                <select class=contact-field name="search-by" id="search-by">
                                    <option value="id">Contact-ID</option>
                                    <option value="name">Name</option>
                                </select>
                            </div>
                            <div class=contact-field>
                                <input type=text name=search-value maxlength=200 required>
                            </div>
                            <input class=sub-button type=submit name=submit value="Search">
                        </form>
                    </div>
                </div>
                <?php if (!$contactDetails) { // if no details were found?>
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
                                No data found:
                            </div>
                            <div class=contact-field></div>
                            <div class=contact-field>
                                <?php // prints a message saying ID/Name was not found
                                if (isset($_POST['submit'])) {
                                    if ($_POST['search-by'] === 'id')
                                        echo "ID: " . $_POST['search-value'];
                                    else
                                        echo "Name: " . $_POST['search-value'];
                                } ?>
                            </div>
                        </div>
                <?php } else { foreach ($contactDetails as $contact) { // if details were found ?>
                    <div class=contact>
                        <div class=contact-left>
                            <div class=contact-image>
                                <?php if ($contact['image'] == "") { // if image is empty?>
                                    <img src="./images/avatar.jpg" max-height=50px max-width=100px>
                                    <?php } else { ?>
                                    <img src="<?php echo $contact['image'];} ?>">
                            </div>
                            <div class=contact-left-info>
                                <div class=contact-field>
                                    <?php echo $contact['email'] ?>
                                </div>
                                <div class=contact-field>
                                    <?php echo $contact['number'] ?>
                                </div>
                            </div>
                        </div>
                        <div class=contact-info>
                            <div class=contact-field> ID:
                                <?php echo $contact['contact_id'] ?>
                            </div>
                            <div class=contact-field>
                                <?php echo $contact['name'] ?>
                            </div>
                            <div class=contact-field> Workplace:
                                <?php echo $contact['workplace'] ?>
                            </div>
                            <div class=contact-field> Position:
                                <?php echo $contact['position'] ?>
                            </div>
                        </div>
                    </div>
                <?php } } ?>
            </div>
        </div>
    </div>
</body>

</html>