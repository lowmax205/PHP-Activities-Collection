<?php
require 'config.server.php';

// Function to delete a user from the users table
function deleteUser($userId)
{
    $error = "";
    global $conn; // Use the global mysqli connection

    // Prepare the DELETE statement
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    if ($stmt) {
        // Bind the user ID parameter
        $stmt->bind_param("i", $userId);

        // Execute the statement
        if ($stmt->execute()) {
            $error =  "User deleted successfully.";
        } else {
            $error =  "Error deleting user: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        $error =  "Error preparing statement: " . $conn->error;
    }
    return $error;
}

// Function to edit user data
function editUser($userId, $userData)
{
    global $conn; // Use the global mysqli connection

    // Prepare the UPDATE statement
    $stmt = $conn->prepare("UPDATE users SET user_text=?, email_text=?, pwd_text=?, role_text=?, status_text=? WHERE id = ?");
    if ($stmt) {
        // Bind the parameters
        $stmt->bind_param(
            "sssssi",
            $userData['user_text'],
            $userData['email_text'],
            $userData['pwd_text'],
            $userData['role_text'],
            $userData['status_text'],
            $userId
        );

        // Execute the statement
        if ($stmt->execute()) {
            $error =  "User updated successfully.";
        } else {
            $error =  "Error updating user: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        $error =  "Error preparing statement: " . $conn->error; // Use $conn for error reporting
    }
    return $error;
}

function addUser($userData)
{
    global $conn; // Use the global mysqli connection

    // Prepare the INSERT statement
    $stmt = $conn->prepare("INSERT INTO users (user_text, email_text, pwd_text, role_text, status_text) VALUES (?, ?, ?, ?, ?)");
    if ($stmt) {
        // Bind the parameters
        $stmt->bind_param(
            "sssss",
            $userData['user_text'],
            $userData['email_text'],
            $userData['pwd_text'],
            $userData['role_text'],
            $userData['status_text']
        );

        // Execute the statement
        if ($stmt->execute()) {
            $error =  "User added successfully.";
        } else {
            $error =  "Error adding user: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        $error =  "Error preparing statement: " . $conn->error; // Use $conn for error reporting
    }
    return $error;
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