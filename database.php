<?php
session_start();
require 'server/credential.server.php'; // Include your credential file

// Redirect to login if the user is not logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userData = [
        'user_text' => $_POST['new_user_text'],
        'email_text' => $_POST['new_email_text'],
        'pwd_text' => $_POST['new_pwd_text'],
        'role_text' => $_POST['new_role_text'],
        'status_text' => $_POST['new_status_text'],
        'time_modify' => $_POST['new_time_modify'],
    ];
}

// Handle delete request
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $userId = intval($_GET['id']);
    deleteUser($userId); // Call the deleteUser function
    header('Location: database.php?success=User deleted successfully');
    exit();
}

// Handle edit request
if (isset($_POST['edit_user_id'])) {
    $userId = intval($_POST['edit_user_id']);
    editUser($userId, $userData); // Call the editUser function
    header('Location: database.php?success=User updated successfully');
    exit();
}

// Handle add user request
if (isset($_POST['add_user'])) {
    addUser($userData); // Call the addUser function (you need to implement this function)
    header('Location: database.php?success=User added successfully');
    exit();
}

// Fetch data from the database
$data = [];
try {
    $result = $conn->query("SELECT id, user_text, email_text, pwd_text, role_text, status_text, time_modify FROM users");
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
    <link rel="stylesheet" href="css/popup_style.css">
</head>

<body>
    <header>
        <h1>Database Management</h1>
        <?php if (isset($_SESSION['username'])): ?>
            <p>Welcome <?php echo htmlspecialchars($_SESSION['username']); ?> -
                <?php echo htmlspecialchars($_SESSION['role_text']); ?>
            </p>
        <?php endif; ?>
        <form action="server/logout.server.php" method="POST" style="display: inline;">
            <button type="submit">Logout</button>
        </form>
        <form action="index.php" method="POST" style="display: inline;">
            <button type="submit">Go Back</button>
        </form>
    </header>
    <div class="container">
        <div class="table">
            <h2>User Details List</h2>
            <button onclick="showAddUserNotification()" , class="adduser">Add User</button>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Action</th>
                        <th>Time Modify</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data as $row) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['user_text']}</td>
                                <td>{$row['email_text']}</td>
                                <td>{$row['role_text']}</td>
                                <td>{$row['status_text']}</td>
                                <td>
                                    <a href='#' onclick='editUser({$row['id']}, \"{$row['user_text']}\", \"{$row['role_text']}\")'>Edit</a> | 
                                    <a href='database.php?action=delete&id={$row['id']}' onclick='return confirm(\"Are you sure you want to delete this user?\");'>Delete</a>
                                </td>
                                <td>{$row['time_modify']}</td>
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
            <label for="edit_user_id">ID: <span id="edit_user_id_display"></span></label>
            <input type="hidden" name="edit_user_id" id="edit_user_id">
            <br>
            <label for="user_text">Username:</label>
            <input type="text" name="user_text" id="user_text" required>
            <br>
            <label for="email_text">Email:</label>
            <input type="email" name="email_text" id="email_text" required>
            <br>
            <label for="pwd_text">Password:</label>
            <input type="password" name="pwd_text" id="pwd_text" required>
            <br>
            <label for="role_text">Role:</label>
            <select name="role_text" id="role_text" required>
                <option value="" disabled>Select Role</option>
                <option value="Teacher" id="role_teacher">Teacher</option>
                <option value="Student" id="role_student">Student</option>
            </select>
            <br>
            <label for="status_text">Status:</label>
            <select name="status_text" id="status_text" required>
                <option value="" disabled>Select Status</option>
                <option value="enrolled" id="enrolled_status">Enrolled</option>
                <option value="transferee" id="transferee_status">Transferee</option>
                <option value="irregular" id="irregular_status">Irregular</option>
                <option value="employed" id="employed_status">Employed</option>
            </select>
            <br>
            <input type="hidden" name="edit_user_id" id="edit_user_id">
            <button type="submit">Update User</button>
            <button type="button" onclick="closeNotification()">Cancel</button>
        </form>
    </div>

    <!-- Add User Notification -->
    <div id="addUserNotification">
        <h2>Add User</h2>
        <form method="POST">
            <input type="hidden" name="add_user" value="1" id="add_user">
            <label for="new_user_text">Username:</label>
            <input type="text" name="new_user_text" id="new_user_text" required>
            <br>
            <label for="email_text">Email:</label>
            <input type="email" name="email_text" id="email_text" required>
            <br>
            <label for="new_pwd_text">Password:</label>
            <input type="password" name="new_pwd_text" id="new_pwd_text" required>
            <br>
            <label for="confirm_pwd_text">Confirm Password:</label>
            <input type="password" name="confirm_pwd_text" id="confirm_pwd_text" required>
            <br>
            <label for="new_role_text">Role:</label>
            <select name="new_role_text" id="new_role_text" required>
                <option value="" disabled selected>Select Role</option>
                <option value="Teacher">Teacher</option>
                <option value="Student">Student</option>
            </select>
            <br>
            <label for="status_text">Status:</label>
            <select name="status_text" id="status_text" required>
                <option value="" disabled selected>Select Status</option>
                <option value="enrolled" id="enrolled_status">Enrolled</option>
                <option value="transferee" id="transferee_status">Transferee</option>
                <option value="irregular" id="irregular_status">Irregular</option>
                <option value="employed" id="employed_status">Employed</option>
            </select>
            <br>
            <button type="submit">Add User</button>
            <button type="button" onclick="closeNotification()">Cancel</button>
        </form>
    </div>

    <script src="javascript/DatabaseScript.js"></script>
</body>

</html>