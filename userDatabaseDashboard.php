<?php
session_start();
require 'server/credential.server.php'; // Include your credential file

// Redirect to login if the user is not logged in
if (!isset($_SESSION['username'])) {
    header('Location: userLogin.php');
    exit();
}

// Handle delete request
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $userId = intval($_GET['id']);
    $error = deleteUser($userId); // Capture the error message
    header('Location: userDatabaseDashboard.php?status=' . urlencode($error));
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $userData = [
        'user_text' => $_POST['new_user_text'],
        'email_text' => $_POST['new_email_text'],
        'pwd_text' => $_POST['new_pwd_text'],
        'role_text' => $_POST['new_role_text'],
        'status_text' => $_POST['new_status_text']
    ];
    // Handle edit request
    if (isset($_POST['edit_user_id'])) {
        $userId = intval($_POST['edit_user_id']);
        $error = editUser($userId, $userData); // Capture the error message
        header('Location: userDatabaseDashboard.php?status=' . urlencode($error));
        exit();
    }

    // Handle add user request
    if (isset($_POST['add_user'])) {
        $error = addUser($userData); // Capture the error message
        header('Location: userDatabaseDashboard.php?status=' . urlencode($error));
        exit();
    }
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
    <div class="error">
        <p>STATUS:</p>
        <?php if (isset($_GET['status']) && !empty($_GET['status'])) {
            $statusMessage = htmlspecialchars($_GET['status']);
        ?>
        <p><?php echo $statusMessage; ?></p>
        <?php } ?>
    </div>


    <div class="container">
        <div class="table">
            <h2>User Details List</h2>
            <div class="line-div">
            <button onclick="showAddUserNotification()" , class="adduser">Add User</button>
            <form action="" method="GET" class="search-form">
                <input type="search" name="searching" id="searching">
                <button type="submit" class="adduser">Search</button>
            </form>
            </div>
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
                                    <a href='#' onclick='editUser({$row['id']}, \"{$row['user_text']}\", \"{$row['email_text']}\", \"{$row['pwd_text']}\", \"{$row['role_text']}\", \"{$row['status_text']}\")'>Edit</a> | 
                                    <a href='userDatabaseDashboard.php?action=delete&id={$row['id']}' onclick='return confirm(\"Are you sure you want to delete this user?\");'>Delete</a>
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
    <div id="editUserNotification" class="popup">
        <h2>Edit User</h2>
        <form method="POST" class="popup-form">
            <label for="edit_user_id">ID: <span id="edit_user_id_display"></span></label>
            <input type="hidden" name="edit_user_id" id="edit_user_id">
            <label for="new_user_text">Username:</label>
            <input type="text" name="new_user_text" id="new_user_text" required>
            <label for="new_email_text">Email:</label>
            <input type="email" name="new_email_text" id="new_email_text" required>
            <label for="new_pwd_text">Password:</label>
            <input type="password" name="new_pwd_text" id="new_pwd_text" required>
            <label for="new_role_text">Role:</label>
            <select name="new_role_text" id="new_role_text" required>
                <option value="" disabled>Select Role</option>
                <option value="teacher" id="role_teacher">Teacher</option>
                <option value="student" id="role_student">Student</option>
            </select>
            <label for="new_status_text">Status:</label>
            <select name="new_status_text" id="new_status_text" required>
                <option value="" disabled>Select Status</option>
                <option value="enrolled" id="enrolled_status">Enrolled</option>
                <option value="transferee" id="transferee_status">Transferee</option>
                <option value="irregular" id="irregular_status">Irregular</option>
                <option value="employed" id="employed_status">Employed</option>
            </select>
            <button type="submit" class="submit-btn">Update User</button>
            <button type="button" class="cancel-btn" onclick="closeNotification()">Cancel</button>
        </form>
    </div>

    <!-- Add User Notification -->
    <div id="addUserNotification" class="popup">
        <h2>Add User</h2>
        <form method="POST" class="popup-form">
            <input type="hidden" name="add_user" value="1" id="add_user">
            <label for="new_user_text">Username:</label>
            <input type="text" name="new_user_text" id="new_user_text" required>
            <label for="email_text">Email:</label>
            <input type="email" name="new_email_text" id="email_text" required>
            <label for="new_pwd_text">Password:</label>
            <input type="password" name="new_pwd_text" id="new_pwd_text" required>
            <label for="confirm_pwd_text">Confirm Password:</label>
            <input type="password" name="confirm_pwd_text" id="confirm_pwd_text" required>
            <label for="new_role_text">Role:</label>
            <select name="new_role_text" id="new_role_text" required>
                <option value="" disabled selected>Select Role</option>
                <option value="Teacher">Teacher</option>
                <option value="Student">Student</option>
            </select>
            <label for="new_status_text">Status:</label>
            <select name="new_status_text" id="new_status_text" required>
                <option value="" disabled selected>Select Status</option>
                <option value="enrolled" id="enrolled_status">Enrolled</option>
                <option value="transferee" id="transferee_status">Transferee</option>
                <option value="irregular" id="irregular_status">Irregular</option>
                <option value="employed" id="employed_status">Employed</option>
            </select>
            <button type="submit" class="submit-btn">Add User</button>
            <button type="button" class="cancel-btn" onclick="closeNotification()">Cancel</button>
        </form>
    </div>

    <script src="js/userPopup.js"></script>
</body>

</html>