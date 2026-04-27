<?php
// Database connection and auto-table creation
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "user_registration_db";

$conn = new mysqli($host, $user, $pass);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if not exists
$conn->query("CREATE DATABASE IF NOT EXISTS $dbname");
$conn->select_db($dbname);

// Create users table if not exists
$table = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(50) NOT NULL,
    lname VARCHAR(50) NOT NULL,
    dept VARCHAR(50) NOT NULL,
    gender VARCHAR(10) NOT NULL,
    hobbies VARCHAR(255),
    others TEXT,
    user_email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
)";
$conn->query($table);
?>