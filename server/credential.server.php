<?php
require 'config.server.php';

// Function to delete a user from the users table
function deleteUser($userId)
{
    global $conn; // Use the global mysqli connection

    // Prepare the DELETE statement
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    if ($stmt) {
        // Bind the user ID parameter
        $stmt->bind_param("i", $userId);

        // Execute the statement
        if ($stmt->execute()) {
            echo "User deleted successfully.";
        } else {
            echo "Error deleting user: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error; // Use $conn for error reporting
    }
}

// Function to edit user data
function editUser($userId, $userData)
{
    global $conn; // Use the global mysqli connection

    // Prepare the UPDATE statement
    $stmt = $conn->prepare("UPDATE users SET user_text = ?, role_text = ? WHERE id = ?");
    if ($stmt) {
        // Bind the parameters
        $stmt->bind_param("ssi", $userData['user_text'], $userData['role_text'], $userId);

        // Execute the statement
        if ($stmt->execute()) {
            echo "User updated successfully.";
        } else {
            echo "Error updating user: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error; // Use $conn for error reporting
    }
}

// Example usage: delete a user with ID 1
// deleteUser(1); // Uncomment this line to test the function

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
        echo "Error fetching data: " . $conn->error; // Use $conn for error reporting
    }
} catch (Exception $e) {
    echo "Error fetching data: " . $e->getMessage();
}
