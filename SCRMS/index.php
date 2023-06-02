<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>SCRMS - Home</title>
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
            <li><a href="./contacts.php">Contacts</a></li>

            <?php
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
        <div class=welcome>
            <h1>Welcome to SCRMS</h1>
        </div>
        <?php
        if (isset($_SESSION["user_id"])) {
            ?>
            <div class=welcome-login>
                <br>
                <h1>Logged in as:
                    <a href="./profile.php"><?php echo $_SESSION["user_name"]; ?></a>
                    <br><br><br><br><br>
                    <a href="./dashboard.php">Get Started</a>
                </h1>
                <br><br>
                
            </div>
            <?php
        } else {
            ?>
            <div class=wrapper-login>
                <div class=index-signup>
                    <h1 class="form-title">Sign Up</h1>
                    <form class="home-form" action="includes/signup-inc.php" method="POST">
                        <label for="fullname">Full Name</label></br>
                        <input type="text" id="fullname" name="fullname" maxlength="30" required><br><br>

                        <label for="companyname">Company</label></br>
                        <input type="text" id="companyname" name="companyname" maxlength="100" required><br><br>

                        <label for="signupEmail">Email</label></br>
                        <input type="email" id="signupEmail" name="signupEmail" required><br><br>

                        <label for="password">Password</label></br>
                        <input type="password" id="password" name="password" minlength="7" required><br><br>

                        <label for="repPass">Repeat Password</label></br>
                        <input type="password" id="repPass" name="repPass" minlength="7" required><br><br>

                        <input type="checkbox" id="terms" name="terms" required>
                        <label for="terms">
                            I have read and agree to the <a class=form-text href="terms_of_service.html"> Terms of
                                Service</a><br>
                            and <a class=form-text href="privacy_policy.html">Privacy Policy</a>.</label><br><br>

                        <input class="sub-button" type="submit" name="submit" value="SIGN UP">

                    </form>

                    <p id="error" style="background: transparent; color: darkred;">
                        <?php if (isset($_GET['error']) && $_GET['error'] !== 'none')
                            echo $_GET['error']; ?>
                    </p>
                </div>
                <div class=index-login>
                    <h1 class="form-title">Log In</h1>
                    <form class="home-form" action="includes/login-inc.php" method="POST">
                        <label for="loginEmail">Email</label><br>
                        <input type="email" id="loginEmail" name="loginEmail" required><br><br>

                        <label for="password">Password</label><br>
                        <input type="password" id="loginPassword" name="loginPassword" required><br><br><br>

                        <input class="sub-button" type="submit" name="submit" value="LOG IN">

                    </form>
                    <p><a class=form-text href="forgot_password.html">Forgot your password?</a></p>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</body>

</html>