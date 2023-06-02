<?php
session_start();
if (empty($_SESSION["user_name"])) {
    header("location:/index.php?error=nologin");
}

include("./classes/dbhandler-classes.php");
include("./classes/profile-classes.php");
include("./classes/profile-contr-classes.php");

$profile = new ProfileContr($_SESSION["user_id"]);

$userData = $profile->profileUser();

if(isset($_POST['update'])) {
    $profile->updateProfile($_POST['image'], $_POST['name'], $_POST['email'], $_POST['number'], $_POST['company'], $_POST['position']);

    $userData = $profile->profileUser(); // gets the new updated data
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>SCRMS - Profile</title>
    <link rel="shortcut icon" href="https://icon-library.com/images/crm-icon/crm-icon-6.jpg">
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/profile.css">


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
                <li style="float:right"><a href="./">
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


    <?php
    # Getting User Data
    
    ?>

    <div class=wrapper-flex>
        <div class="profile-wrapper">
            <div class=profile-list>
                <div class=profile>
                    <div class=profile-left>
                        <div class=profile-image>
                            <?php if ($userData[0]['image'] == "") { // if image is empty?>
                            <img src="./images/avatar.jpg" max-height=125px max-width=250px>
                            <?php } else { ?>
                            <img src="<?php echo $userData[0]['image']; ?>"> <?php } ?>
                        </div>
                        <div class=profile-left-info></div>
                    </div>
                    <div class=profile-info>
                        <form action=#update method=POST>
                            
                            <div class=profile-section>
                                Personal Data:
                            </div>
                            <div class=profile-field>
                                <input type=text name=image placeholder=ImageUrl value="<?php echo $userData[0]['image'];?>" maxlength=500>
                            </div>
                            <div class=profile-field>
                                <input type=text name=name placeholder=Name* value="<?php echo $userData[0]['user_name'];?>" maxlength=50 required>
                            </div>
                            <div class=profile-field>
                                <input type=text name=email placeholder=contact@email.com value="<?php echo $userData[0]['email'];?>" maxlength=100>
                            </div>
                            <div class=profile-field>
                                <input type=text name=number placeholder="Phone Number" value="<?php echo $userData[0]['number'];?>" maxlength=20>
                            </div>
                            <div class=profile-section>
                                Company Data:
                            </div>
                            <div class=profile-field>
                                <input type=text name=company placeholder=Company value="<?php echo $userData[0]['company_name'];?>" maxlength=100>
                            </div>
                            <div class=profile-field>
                                <input type=text name=position placeholder=Position value="<?php echo $userData[0]['position'];?>" maxlength=100>
                            </div>
                            
                            
                            <input class=sub-button type=submit name=update value="Update">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>