CREATE DATABASE hr_db
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE hr_db;

CREATE TABLE employees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(150) NOT NULL,
    email VARCHAR(100) UNIQUE,
    department ENUM('HR','Finance','IT','Marketing','Sales') NOT NULL,
    hire_date DATE NOT NULL,
    salary DECIMAL(15,2) NOT NULL
);
