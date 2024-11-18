<?php
require 'config.server.php';

// Function to prepare and execute a statement
function executeStatement($stmt) {
    if ($stmt->execute()) {
        return true;
    } else {
        return "Error: " . $stmt->error;
    }
}

// Function to check if a user exists
function userExists($userData) {
    global $conn; // Use the global mysqli connection
    $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE user_text = ? OR email_text = ?");
    $stmt->bind_param("ss", $userData['user_text'], $userData['email_text']);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();
    return $count > 0;
}

// Function to delete a user from the users table
function deleteUser($userId) {
    global $conn; // Use the global mysqli connection
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param("i", $userId);
        return executeStatement($stmt) ? "User deleted successfully." : "Error deleting user: " . $stmt->error;
    } else {
        return "Error preparing statement: " . $conn->error;
    }
}

// Function to edit user data
function editUser($userId, $userData) {
    if (userExists($userData)) {
        return "Username or Email already exists."; // Return error message if user exists
    }

    global $conn; // Use the global mysqli connection
    $stmt = $conn->prepare("UPDATE users SET user_text=?, email_text=?, pwd_text=?, role_text=?, status_text=? WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param(
            "sssssi",
            $userData['user_text'],
            $userData['email_text'],
            $userData['pwd_text'],
            $userData['role_text'],
            $userData['status_text'],
            $userId
        );
        return executeStatement($stmt) ? "User updated successfully." : "Error updating user: " . $stmt->error;
    } else {
        return "Error preparing statement: " . $conn->error; // Use $conn for error reporting
    }
}

// Function to add a user
function addUser($userData) {
    if (userExists($userData)) {
        return "Username or Email already exists."; // Return error message if user exists
    }

    global $conn; // Use the global mysqli connection
    $stmt = $conn->prepare("INSERT INTO users (user_text, email_text, pwd_text, role_text, status_text) VALUES (?, ?, ?, ?, ?)");
    if ($stmt) {
        $stmt->bind_param(
            "sssss",
            $userData['user_text'],
            $userData['email_text'],
            $userData['pwd_text'],
            $userData['role_text'],
            $userData['status_text']
        );
        return executeStatement($stmt) ? "User added successfully." : "Error adding user: " . $stmt->error;
    } else {
        return "Error preparing statement: " . $conn->error; // Use $conn for error reporting
    }
}

// Function to fetch all users
function fetchAllUsers() {
    global $conn;
    $data = [];
    $result = $conn->query("SELECT id, user_text, email_text, pwd_text, role_text, status_text, time_modify FROM users");
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        $result->free();
    }
    return $data;
}

// Function to search users by username or email
function searchUsers($searchQuery) {
    global $conn;
    $data = [];
    $stmt = $conn->prepare("SELECT id, user_text, email_text, pwd_text, role_text, status_text, time_modify FROM users WHERE user_text LIKE ? OR email_text LIKE ?");
    $searchTerm = '%' . $searchQuery . '%';
    $stmt->bind_param("ss", $searchTerm, $searchTerm);
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        $stmt->close();
    }
    return $data;
}

// Function to reset the table to its default view
function resetTable() {
    header('Location: ../userDatabaseDashboard.php');
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
        $error = "Error fetching data: " . $conn->error;
    }
} catch (Exception $e) {
    $error = "Error fetching data: " . $e->getMessage();
}