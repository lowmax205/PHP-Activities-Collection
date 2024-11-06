<?php
// Database configuration
$host = 'localhost';
$dbname = 'phpactivity';
$db_user = 'adminphp';
$db_password = 'admin123';

// Create a new mysqli connection
$conn = new mysqli($host, $db_user, $db_password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if database exists
$db_selected = mysqli_select_db($conn, $dbname);

if (!$db_selected) {
    // If database does not exist, create it
    $sql = file_get_contents('db.sql');
    if ($conn->multi_query($sql)) {
        do {
            // Store first result set
            if ($result = $conn->store_result()) {
                $result->free();
            }
        } while ($conn->next_result());
    } else {
        die("Error creating database: " . $conn->error);
    }
}

// Reconnect to the newly created database
$conn->select_db($dbname);
?>