<?php
// essentially logs out the user
session_start();
session_unset();
session_destroy();

// Going back to front page
header("location: ../index.php?error=none");