<?php
session_start();
require 'config.server.php';
// Enable error reporting

$error = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if username already exists
    $checkQuery = "SELECT * FROM users WHERE user_text = '$username'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // Username already exists
        $error = "Username already taken. Please choose another.";
    } else {
        // Insert new user into the database with a hashed password and default role as 'student'
        $insertQuery = "INSERT INTO users (user_text, pwd_text, role_text) VALUES ('$username', '$password', 'student')";

        if (mysqli_query($conn, $insertQuery)) {
            // Registration successful
            $_SESSION['logged_in'] = true;
            header('Location: ./login.php');
            exit();
        } else {
            $error = "Error registering. Please try again.";
        }
    }

    mysqli_free_result($checkResult);
}
mysqli_close($conn);
