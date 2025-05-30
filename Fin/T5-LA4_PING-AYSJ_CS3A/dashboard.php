<?php
session_start();
// Redirect to login page if user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
include "db.php";

// Get username from session for greeting
$username = $_SESSION['username'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f5f7fa;
      margin: 0; padding: 0;
    }
    header {
      background: #081b5a; /* navy blue */
      color: white;
      padding: 1rem 2rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    header h1 {
      margin: 0;
      font-size: 1.5rem;
    }
    nav a {
      color: white;
      margin-left: 1rem;
      text-decoration: none;
      font-weight: bold;
    }
    nav a:hover {
      text-decoration: underline;
    }
    main {
      max-width: 900px;
      margin: 2rem auto;
      background: white;
      padding: 2rem;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgb(0 0 0 / 0.1);
    }
    h2 {
      margin-top: 0;
      color: #081b5a;
    }
    .stats {
      display: flex;
      gap: 2rem;
      margin-top: 1.5rem;
    }
    .stat {
      flex: 1;
      background: #e1e7f7;
      padding: 1rem;
      border-radius: 6px;
      text-align: center;
    }
    .stat h3 {
      margin: 0 0 0.5rem;
      font-weight: normal;
      color: #081b5a;
    }
    .stat p {
      font-size: 1.25rem;
      margin: 0;
      font-weight: bold;
    }
  </style>
</head>
<body>

<header>
  <!-- Greeting the logged-in user -->
  <h1>Welcome, <?= htmlspecialchars($username) ?>!</h1>
  <!-- Navigation links -->
  <nav>
    <a href="chat.php">Chat</a>
    <a href="logout.php">Logout</a>
  </nav>
</header>

<main>
  <h2>Dashboard Overview</h2>

  <div class="stats">
    <div class="stat">
      <h3>Total Users</h3>
      <p>
        <?php
        // Query total number of registered users
        $res = $conn->query("SELECT COUNT(*) AS total FROM users");
        $row = $res->fetch_assoc();
        echo $row['total'];
        ?>
      </p>
    </div>

    <div class="stat">
      <h3>Your Messages Sent</h3>
      <p>
        <?php
        // Query count of messages sent by the current user
        $userId = $_SESSION['user_id'];
        $res = $conn->prepare("SELECT COUNT(*) AS total FROM messages WHERE user_id = ?");
        $res->bind_param("i", $userId);
        $res->execute();
        $result = $res->get_result();
        $count = $result->fetch_assoc();
        echo $count['total'];
        ?>
      </p>
    </div>
  </div>
</main>

</body>

</html>
