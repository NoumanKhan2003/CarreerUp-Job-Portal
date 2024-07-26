<?php
$host = 'localhost';
$username = 'root';
$password = '';

// Create a new MySQLi instance
$conn = new mysqli($host, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set the charset to UTF-8
$conn->set_charset("utf8");
?>
