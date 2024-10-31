CREATE DATABASE phpactivity;

USE phpactivity;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_text VARCHAR(50) NOT NULL UNIQUE,
    email_text VARCHAR(50) NOT NULL UNIQUE,
    pwd_text VARCHAR(255) NOT NULL,
    role_text ENUM('student', 'teacher') NOT NULL,
    status_text ENUM('enrolled', 'transferee', 'employed', 'irregular') NOT NULL,
    time_modify TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP 
);

INSERT INTO users (user_text, email_text, pwd_text, role_text, status_text)  -- Updated to include email_text and role_text
VALUES ('admin', 'admin@example.com', 'adminpass', 'teacher', 'employed'),  -- Example admin as teacher
       ('student1', 'student1@example.com', 'studentpass', 'student', 'enrolled'),  -- Example student1
       ('student2', 'student2@example.com', 'studentpass', 'student', 'irregular'),  -- Example student2
       ('student3', 'student3@example.com', 'studentpass', 'student', 'transferee'),  -- Example student3
       ('student4', 'student4@example.com', 'studentpass', 'student', 'enrolled');  -- Example student4

GRANT ALL PRIVILEGES ON phpactivity.* TO 'adminphp'@'localhost' IDENTIFIED BY 'admin123';