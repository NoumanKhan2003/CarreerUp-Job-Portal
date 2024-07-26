<?php
include "config.php";
$dbname = 'Job_Portal';
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
$conn->select_db($dbname);
$sql = "CREATE TABLE IF NOT EXISTS Job_Seekers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    mobile VARCHAR(15) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    verified BOOLEAN DEFAULT TRUE
)";
$conn->close();

?>
