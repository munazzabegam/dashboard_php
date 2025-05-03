<?php
session_start();                         // Start the session (needed to access session variables)
include_once("includes/config.php");     // Include your config file (optional unless needed for logout logic)

session_unset();                         // Remove all session variables
session_destroy();                       // Destroy the session completely
header("Location: index.php");           // Redirect the user to the homepage
exit();                                  // Ensure no further code runs
?>
