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
    <title>SCRMS - Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://icon-library.com/images/crm-icon/crm-icon-6.jpg">
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/index.css">
</head>

<body>
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
        
    </div>
</body>
</html>
