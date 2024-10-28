CREATE DATABASE phpactivity;

USE phpactivity;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_text VARCHAR(50) NOT NULL UNIQUE,
    pwd_text VARCHAR(255) NOT NULL,
    role_text ENUM('student', 'teacher') NOT NULL  -- Added role column for authorization
);

INSERT INTO users (user_text, pwd_text, role)  -- Updated to include role
VALUES ('admin', 'adminpass', 'teacher'),  -- Example admin as teacher
       ('student1', 'studentpass', 'student');  -- Example student

GRANT ALL PRIVILEGES ON phpactivity.* TO 'adminphp'@'localhost' IDENTIFIED BY 'admin123';