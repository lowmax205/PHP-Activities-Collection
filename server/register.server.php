<?php
session_start();
require 'config.server.php'; 
// Enable error reporting

$error = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if username already exists
    $checkQuery = "SELECT * FROM users WHERE user_text = ?";
    $checkStmt = $conn->prepare($checkQuery);
    $checkStmt->bind_param('s', $username);
    $checkStmt->execute();
    $checkStmt->store_result();

    if ($checkStmt->num_rows > 0) {
        // Username already exists
        $error = "Username already taken. Please choose another.";
    } else {
        // Insert new user into the database with a hashed password
        $insertQuery = "INSERT INTO users (user_text, pwd_text) VALUES (?, ?)";
        $insertStmt = $conn->prepare($insertQuery);

        $insertStmt->bind_param('ss', $username, $password);

        if ($insertStmt->execute()) {
            // Registration successful
            $_SESSION['logged_in'] = true;
            header('Location: ../login.php');
            exit();
        } else {
            $error = "Error registering. Please try again.";
        }
    }

    $checkStmt->close();
    $insertStmt->close();
}
$conn->close();
?>