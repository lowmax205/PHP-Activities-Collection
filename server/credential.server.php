<?php
require 'config.server.php';

function deleteUser($userId)
{
    global $conn;
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param("i", $userId);
        if (!$stmt->execute()) {
            echo "Error deleting user: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

function editUser($userId, $userData)
{
    global $conn;
    $stmt = $conn->prepare("UPDATE users SET user_text=?, email_text=?, pwd_text=?, role_text=?, status_text=?, time_modify = ? WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param(
            "ssssssi",
            $userData['user_text'],
            $userData['email_text'],
            $userData['pwd_text'],
            $userData['role_text'],
            $userData['status_text'],
            $userData['time_modify'],
            $userId
        );
        if (!$stmt->execute()) {
            echo "Error updating user: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

function addUser($userData)
{
    global $conn;
    $stmt = $conn->prepare("INSERT INTO users (user_text, email_text, pwd_text, role_text, status_text, time_modify) VALUES (?, ?, ?, ?, ?, ?)");
    if ($stmt) {
        $stmt->bind_param(
            "ssssss",
            $userData['user_text'],
            $userData['email_text'],
            $userData['pwd_text'],
            $userData['role_text'],
            $userData['status_text'],
            $userData['time_modify']
        );
        if (!$stmt->execute()) {
            echo "Error adding user: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}


// Fetch data from the database
$data = [];
try {
    $result = $conn->query("SELECT id, user_text, email_text, pwd_text, role_text, status_text, time_modify  FROM users");
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
