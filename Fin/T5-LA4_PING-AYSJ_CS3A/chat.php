<?php
// Start the session
session_start();

// Redirect to login page if user is not logged in
if (!isset($_SESSION['user_id'])) {
  header("Location: index.php");
  exit();
}

// Include database connection
include "db.php";

// Fetch all users except the currently logged-in user
$users = $conn->query("SELECT id, username FROM users WHERE id != {$_SESSION['user_id']}");
?>


<!DOCTYPE html>
<html>
<head>
  <title>Chat</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #f5f7fa;
    }

    .container {
      display: flex;
      height: 100vh;
    }

    .sidebar {
      width: 250px;
      background-color: #081b5a;
      color: white;
      padding: 20px;
      box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
    }

    .sidebar h3 {
      margin-top: 0;
      margin-bottom: 15px;
    }

    #user-list {
      list-style-type: none;
      padding: 0;
    }

    #user-list li {
      margin-bottom: 10px;
    }

    #user-list a {
      color: white;
      text-decoration: none;
      display: block;
      padding: 8px 10px;
      border-radius: 6px;
      transition: background-color 0.2s;
    }

    #user-list a:hover {
      background-color: #0a2472;
    }

    .chat-section {
      flex-grow: 1;
      padding: 20px;
      display: flex;
      flex-direction: column;
    }

    .chat-header {
      font-size: 1.2em;
      font-weight: bold;
      margin-bottom: 10px;
    }

    #chat-box {
      flex-grow: 1;
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 6px;
      padding: 10px;
      overflow-y: scroll;
      margin-bottom: 15px;
      height: 400px;
    }

    #chat-form {
      display: flex;
      gap: 10px;
    }

    #message {
      flex-grow: 1;
      padding: 10px;
      border-radius: 6px;
      border: 1px solid #ccc;
    }

    #chat-form button {
      padding: 10px 20px;
      background-color: #081b5a;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
    }

    #chat-form button:hover {
      background-color: #0a2472;
    }

    .logout {
      position: absolute;
      top: 10px;
      right: 20px;
      color: #081b5a;
      font-weight: bold;
      text-decoration: none;
    }

    .logout:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

<!-- Logout link -->
<a class="logout" href="logout.php">Logout</a>

<!-- Main container with sidebar and chat section -->
<div class="container">

  <!-- Sidebar: List of other users -->
  <div class="sidebar">
    <h3>Users</h3>
    <ul id="user-list">
      <?php while ($user = $users->fetch_assoc()): ?>
        <li>
          <!-- Link to start chat with selected user -->
          <a href="chat.php?user=<?= $user['id'] ?>"><?= htmlspecialchars($user['username']) ?></a>
        </li>
      <?php endwhile; ?>
    </ul>
  </div>

  <!-- Chat section -->
  <div class="chat-section">
    <?php
    // Check if a user is selected for chat
    $receiver_id = isset($_GET['user']) ? (int)$_GET['user'] : 0;
    if ($receiver_id):
      // Get the selected user's username
      $stmt = $conn->prepare("SELECT username FROM users WHERE id = ?");
      $stmt->bind_param("i", $receiver_id);
      $stmt->execute();
      $stmt->bind_result($receiver_name);
      $stmt->fetch();
      $stmt->close();
    ?>
      <!-- Display selected user's name -->
      <div class="chat-header">Chat with <?= htmlspecialchars($receiver_name) ?></div>

      <!-- Chat messages container -->
      <div id="chat-box"></div>

      <!-- Message sending form -->
      <form id="chat-form">
        <input type="hidden" id="receiver_id" value="<?= $receiver_id ?>">
        <input type="text" id="message" placeholder="Type your message..." autocomplete="off" required>
        <button type="submit">Send</button>
      </form>
    <?php else: ?>
      <!-- Message shown when no user is selected -->
      <div class="chat-header">Select a user to chat with.</div>
    <?php endif; ?>
  </div>
</div>

<!-- JavaScript for handling chat functionality -->
<script src="js/chat.js"></script>

</body>

</html>
