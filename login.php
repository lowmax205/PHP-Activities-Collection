<?php
session_start();
require 'config.php'; // Include the database configuration

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
            header('Location: index.php?success=login');
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



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
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

<body>
    <div class="container">
        <h2>Login to view activities</h2>
        <?php if (!empty($error)) { // Check if there is an error message ?>
            <p style='color:red;'><?php echo htmlspecialchars($error); ?></p>
        <?php } ?>
        <form action="login.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
            <button type="submit">Login</button>
        </form>
        <br>
        <button onclick="window.location.href='register.php'">Register</button>
    </div>
</body>

</html>