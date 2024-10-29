<?php
session_start();
require 'server/credential.server.php'; // Include your credential file

// Redirect to login if the user is not logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

// Handle delete request
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $userId = intval($_GET['id']);
    deleteUser($userId); // Call the deleteUser function
    header('Location: database.php?success=User deleted successfully');
    exit();
}

// Handle edit request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_user_id'])) {
    $userId = intval($_POST['edit_user_id']);
    $userData = [
        'user_text' => $_POST['user_text'],
        'role_text' => $_POST['role_text'],
    ];
    editUser($userId, $userData); // Call the editUser function
    header('Location: database.php?success=User updated successfully');
    exit();
}

// Fetch data from the database
$data = [];
try {
    $result = $conn->query("SELECT id, user_text, role_text FROM users");
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        $result->free();
    } else {
        echo "Error fetching data: " . $conn->error;
    }
} catch (Exception $e) {
    echo "Error fetching data: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Management</title>
    <link rel="stylesheet" href="css/activty_style.css">
</head>

<body>
    <header>
        <h1>Database Management</h1>
        <?php if (isset($_SESSION['username'])): ?>
            <p>Welcome <?php echo htmlspecialchars($_SESSION['username']); ?>
                <?php echo htmlspecialchars($_SESSION['role_text']); ?>
            </p>
        <?php endif; ?>
        <form action="server/logout.server.php" method="POST" style="display: inline;">
            <button type="submit">Logout</button>
        </form>
        <form action="index.php" method="GET" style="display: inline;">
            <button type="submit">Go Back</button>
        </form>
    </header>
    <div class="container">
        <div class="column">
            <h2>Database Management</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data as $row) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['user_text']}</td>
                                <td>
                                    <a href='#' onclick='editUser({$row['id']}, \"{$row['user_text']}\", \"{$row['role_text']}\")'>Edit</a> | 
                                    <a href='database.php?action=delete&id={$row['id']}' onclick='return confirm(\"Are you sure you want to delete this user?\");'>Delete</a>
                                </td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div id="overlay"></div>

    <!-- Edit User Notification -->
    <div id="editUserNotification">
        <h2>Edit User</h2>
        <form method="POST">
            <input type="hidden" name="edit_user_id" id="edit_user_id">
            <label for="user_text">User Text:</label>
            <input type="text" name="user_text" id="user_text" required>
            <br>
            <label for="role_text">Role Text:</label>
            <input type="text" name="role_text" id="role_text" required>
            <br>
            <button type="submit">Update User</button>
            <button type="button" onclick="closeNotification()">Cancel</button>
        </form>
    </div>

    <script src="javascript/editUserScript.js"></script>
</body>

</html>