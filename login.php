<?php
session_start();
require 'config.php'; // Include the database configuration
$error = "";

if (isset($_POST['login'])) {
    $username = $conn->real_escape_string($_POST['username']); // Sanitize input
    $password = $conn->real_escape_string($_POST['password']); // Sanitize input

    $result = $conn->query("SELECT * FROM users WHERE username='$username'");
    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();
        if ($password == $row["password"]) {
            $_SESSION['username'] = $row['username'];
            header('Location: index.php?success=login');
            exit();
        } else {
            $error = 'Password incorrect!';
        }
    } else {
        $error = 'Username incorrect!!';
    }
}

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $username = $_POST['username'];
//     $password = $_POST['password'];

//     // Prepare the SQL query to check user credentials
//     $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

//     // Execute the query
//     $stmt = $conn->query($sql);

//     // Fetch the user data
//     $user = $stmt->fetch(PDO::FETCH_ASSOC);

//     // Validate user credentials
//     if ($user) {
//         // User found, set session variable and redirect
//         $_SESSION['logged_in'] = true;
//         $error = "Login Successfully";
//         sleep(1);
//         header('Location: index.php?success=login');
//         exit();
//     } else {
//         // Invalid credentials
//         $error = "Invalid credentials. Please try again.";
//     }
// }
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
        <button onclick="register.php">Register</button>
    </div>
</body>

</html>