<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: admin_login.php"); // Redirect to admin login page if not an admin
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Orders</title>
</head>
<body>
    <h1>Manage Orders</h1>
    <!-- Admin can view and manage orders here -->
    <p><a href="../logout.php">Logout</a></p>
</body>
</html>
