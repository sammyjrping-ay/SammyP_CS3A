<?php
// Create a new MySQLi connection
$conn = new mysqli("localhost", "root", "", "chat_app");

// Check if the connection failed and display an error message
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
