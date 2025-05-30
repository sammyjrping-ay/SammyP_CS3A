<?php
// Start session to get current user ID
session_start();

// Include database connection
include "db.php";

// Get sender ID from session, receiver ID and message from POST data
$sender = $_SESSION['user_id'];
$receiver = $_POST['receiver_id'];
$message = $_POST['message'];

// Check if message and receiver ID are provided
if ($message && $receiver) {
  // Prepare SQL to insert new message into messages table
  $stmt = $conn->prepare("INSERT INTO messages (user_id, receiver_id, message) VALUES (?, ?, ?)");
  $stmt->bind_param("iis", $sender, $receiver, $message);

  // Execute the insert statement
  $stmt->execute();
}
