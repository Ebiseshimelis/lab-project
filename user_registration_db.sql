-- SQL script to create the database and users table for registration
CREATE DATABASE IF NOT EXISTS user_registration_db;
USE user_registration_db;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(50) NOT NULL,
    lname VARCHAR(50) NOT NULL,
    dept VARCHAR(50) NOT NULL,
    gender VARCHAR(10) NOT NULL,
    hobbies VARCHAR(255),
    others TEXT,
    user_email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);