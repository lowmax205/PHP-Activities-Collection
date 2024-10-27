CREATE DATABASE phpactivity;

USE phpactivity;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_text VARCHAR(50) NOT NULL UNIQUE,
    pwd_text VARCHAR(255) NOT NULL
);

INSERT INTO users (username, password)
VALUES ('admin', 'adminpass');
