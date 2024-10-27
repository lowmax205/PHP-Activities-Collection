<?php
session_start();
require 'config.server.php'; 

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars($_POST['username']); // Sanitize input
    $password = htmlspecialchars($_POST['password']); // Sanitize input
    
    // Prepare and execute the query
    $stmt = $conn->prepare("SELECT * FROM users WHERE user_text = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify password
        if ($password === $row['pwd_text']) {
            $_SESSION['username'] = $row['user_text'];
            header('Location: \index.php?success=login');
            exit();
        } else {
            $error = 'Password incorrect!';
        }
    } else {
        $error = 'Username incorrect!';
    }

    $stmt->close();
}

$conn->close();
?>