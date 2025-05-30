<?php
// Start the session
session_start();

// Include database connection
include "db.php";

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get username and password from POST
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare SQL to get user by username
    $stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    // Get result and fetch user data
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Verify password and start session if valid
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: chat.php"); // Redirect to chat page
    } else {
        $error = "Invalid login."; // Set error message
    }
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #081b5a;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .login-container {
      background: white;
      padding: 30px 40px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.2);
      width: 300px;
    }

    .login-container h2 {
      margin-top: 0;
      margin-bottom: 20px;
      color: #081b5a;
      text-align: center;
    }

    .login-container input[type="text"],
    .login-container input[type="password"] {
      width: 92%;
      padding: 10px;
      margin: 8px 0 15px 0;
      border: 1px solid #ccc;
      border-radius: 6px;
    }

    .login-container button {
      width: 99%;
      padding: 10px;
      background-color: #081b5a;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-weight: bold;
      margin-bottom: 6px;
    }

    .login-container button:hover {
      background-color: #0a2472;
    }

    .error {
      color: red;
      margin-bottom: 15px;
      text-align: center;
    }

    a {
        display: block;
        text-align: center;
        text-decoration: none;
        color: #081b5a;
        width: 93%;
        border: 2px solid #0a2472;
        border-radius: 6px;
        padding: 7px;
        font-weight: bold;
        font-size: 13.5px;
    }
    a:hover {
        background-color: #081b5a;
        color: white;
    }
  </style>
</head>
<body>
  <!-- Login form container -->
  <div class="login-container">
    <h2>Login</h2>

    <!-- Display error message if login failed -->
    <?php if (isset($error)): ?>
      <div class="error"><?= $error ?></div>
    <?php endif; ?>

    <!-- Login form -->
    <form method="POST">
      <!-- Username input -->
      <input type="text" name="username" placeholder="Username" required>

      <!-- Password input -->
      <input type="password" name="password" placeholder="Password" required>

      <!-- Submit button -->
      <button type="submit">Login</button>

      <!-- Link to signup page -->
      <a href="signup.php">Sign up</a>
    </form>
  </div>
</body>

</html>
