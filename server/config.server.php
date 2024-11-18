<?php
// Database configuration
$host = 'localhost';
$dbname = 'phpactivity';
$db_user = 'root';
$db_password = '';

// Create a new mysqli connection
$conn = new mysqli($host, $db_user, $db_password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>