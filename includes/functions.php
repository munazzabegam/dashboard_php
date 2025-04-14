<?php
// Database connection
function getDbConnection() {
    $servername = "localhost";  // Database server
    $username = "root";         // Database username
    $password = "";             // Database password
    $dbname = "restaurant";     // Database name

    // Create a new connection and check for errors
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

// Sanitize user inputs to prevent SQL injection
function sanitizeInput($input) {
    return htmlspecialchars(trim($input));
}

// Example: Check if email is valid
function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
?>
