<?php
// Start the session to get current user ID
session_start();

// Include database connection
include "db.php";

// Get sender (current user) and receiver IDs from session and GET parameters
$sender = $_SESSION['user_id'];
$receiver = $_GET['receiver_id'];

// Prepare SQL to fetch messages between sender and receiver, in both directions
$stmt = $conn->prepare("
  SELECT m.message, m.created_at, u.username
  FROM messages m
  JOIN users u ON m.user_id = u.id
  WHERE (m.user_id = ? AND m.receiver_id = ?)
     OR (m.user_id = ? AND m.receiver_id = ?)
  ORDER BY m.id ASC
");

// Bind parameters: sender and receiver IDs for both directions
$stmt->bind_param("iiii", $sender, $receiver, $receiver, $sender);

// Execute query and get result
$stmt->execute();
$result = $stmt->get_result();

// Fetch all messages into an array
$messages = [];
while ($row = $result->fetch_assoc()) {
  $messages[] = $row;
}

// Return messages as JSON
echo json_encode($messages);
