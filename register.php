<?php
session_start();
require 'config.php';

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if username already exists
    $checkQuery = "SELECT * FROM users WHERE username = :username";
    $checkStmt = $conn->prepare($checkQuery);
    $checkStmt->bindParam(':username', $username);
    $checkStmt->execute();

    if ($checkStmt->rowCount() > 0) {
        // Username already exists
        $error = "Username already taken. Please choose another.";
    } else {
        // Insert new user into the database
        $insertQuery = "INSERT INTO users (username, password) VALUES (:username, :password)";
        $insertStmt = $conn->prepare($insertQuery);
        
        // Store password in plain text
        $insertStmt->bindParam(':username', $username);
        $insertStmt->bindParam(':password', $password);

        if ($insertStmt->execute()) {
            // Registration successful
            $_SESSION['logged_in'] = true;
            echo "Register Successfully";
            sleep(1);
            header('Location: login.php?success=registering');
            exit();
        } else {
            $error = "Error registering. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        background-color: #f4f4f4;
    }

    .container {
        background-color: white;
        padding: 30px;
        /* Padding around the container */
        border-radius: 5px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        width: 20%;
    }

    h2 {
        text-align: center;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="password"] {
        width: calc(100% - 20px);
        /* Adjust width to account for padding */
        padding: 10px;
        margin-bottom: 15px;
        /* Use margin-bottom for spacing */
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    button {
        width: 100%;
        padding: 10px;
        background-color: #28a745;
        color: white;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        margin-bottom: 10px;
    }

    button:hover {
        background-color: #218838;
    }

    .error {
        color: red;
        text-align: center;
        margin-bottom: 15px;
    }
    </style>

</head>

<body>
    <div class="container">
        <h2>Register</h2>
        <?php if (!empty($error)) { echo "<p class='error'>$error</p>"; } ?>
        <form action="register.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Register</button>
        </form>
        <br>
        <button onclick="window.location.href='login.php'">Login</button>
    </div>
</body>

</html>