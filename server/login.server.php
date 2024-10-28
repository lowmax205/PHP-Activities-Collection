<?php
session_start();
require 'config.server.php';

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute the query
    $result = mysqli_query($conn, "SELECT * FROM users WHERE user_text = '$username'");

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result, MYSQLI_BOTH);

        // Verify password
        if ($password == $row['pwd_text']) {
            $_SESSION['username'] = $row['user_text'];
            $_SESSION['role_text'] = $row['role_text'];
            header('Location: ./index.php?success=login');
            exit();
        } else {
            $error = 'Password incorrect!';
        }
    } else {
        $error = 'Username incorrect!';
    }
}
$conn->close();