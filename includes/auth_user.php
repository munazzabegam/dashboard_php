<?php
session_start();

// Check if the user is logged in
function isUserLoggedIn() {
    return isset($_SESSION['user_id']); // Check if 'user_id' is set in the session
}

// Redirect to login page if not logged in
function requireLogin() {
    if (!isUserLoggedIn()) {
        header('Location: /user/login.php');
        exit();
    }
}
?>
