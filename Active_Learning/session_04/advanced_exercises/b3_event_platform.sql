CREATE DATABASE event_db
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE event_db;

CREATE TABLE events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    event_name VARCHAR(200) NOT NULL,
    start_time DATETIME NOT NULL,
    end_time DATETIME NOT NULL,
    event_details JSON
);
