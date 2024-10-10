<?php
// Database configuration
$host = 'localhost';
$dbname = 'phpactivity';
$username = 'root';
$password = '';

$conn = mysql_connect($host,$username,$password);

$db_location = mysql_select_db($dbname, $conn);

if(!$db_location){
    die("Can\'t connect to database!". mysql_error());
}
// // Establish a database connection
// try {
//     $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
//     // Set the PDO error mode to exception
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch (PDOException $e) {
//     echo "Connection failed: " . $e->getMessage();
//     exit();
// }
?>