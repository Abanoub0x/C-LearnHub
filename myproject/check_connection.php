<?php
$servername = "localhost";
$username = "root";
$password = "";  // Empty if no password is set, otherwise put your password here
$dbname = "onlinecourse";  // Replace with your actual database name

$conn = new mysqli($servername, $username, $password, $dbname, 3307);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
