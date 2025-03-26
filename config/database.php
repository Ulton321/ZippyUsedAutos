<?php
// Database configuration
// This file will handle the database connection setup

// Example code for database configuration
$dsn = 'mysql:host=localhost;dbname=zippyusedautos';
$username = 'root';
$password = '';

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    echo "Database Error: $error_message";
    exit();
}
?>