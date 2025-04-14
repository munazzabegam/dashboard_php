<?php
$password = "your_admin_password";
$hash = password_hash($password, PASSWORD_DEFAULT);

echo "Hashed Password: " . $hash;
?>
