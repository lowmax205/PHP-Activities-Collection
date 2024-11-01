<?php
include 'server/login.server.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/credential_style.css">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <h2>Login to view activities</h2>
        <?php if (!empty($error)) { // Check if there is an error message 
        ?>
            <p style='color:red;'><?php echo htmlspecialchars($error); ?></p>
        <?php } ?>
        <form action="userLogin.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>
        <br>
        <button onclick="window.location.href='userRegistration.php'">Register</button>
    </div>
</body>

</html>