<?php
// Include database connection
include "db.php";

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get username from POST
    $username = $_POST['username'];

    // Hash the password securely
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Prepare SQL to insert new user
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);

    // Execute and redirect or set error message
    if ($stmt->execute()) {
        header("Location: index.php"); // Redirect to login page
    } else {
        $error = "Signup failed. Username might already exist.";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>Sign Up</title>
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

    .signup-container {
      background: white;
      padding: 30px 40px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.2);
      width: 300px;
    }

    .signup-container h2 {
      margin-top: 0;
      margin-bottom: 20px;
      color: #081b5a;
      text-align: center;
    }

    .signup-container input[type="text"],
    .signup-container input[type="password"] {
      width: 92%;
      padding: 10px;
      margin: 8px 0 15px 0;
      border: 1px solid #ccc;
      border-radius: 6px;
    }

    .signup-container button {
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

    .signup-container button:hover {
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
  <!-- Signup form container -->
  <div class="signup-container">
    <h2>Sign Up</h2>

    <!-- Display error message if signup failed -->
    <?php if (isset($error)): ?>
      <div class="error"><?= $error ?></div>
    <?php endif; ?>

    <!-- Signup form -->
    <form method="POST">
      <!-- Username input -->
      <input type="text" name="username" placeholder="Username" required>

      <!-- Password input -->
      <input type="password" name="password" placeholder="Password" required>

      <!-- Submit button -->
      <button type="submit">Sign Up</button>

      <!-- Link to login page -->
      <a href="index.php">Login</a>
    </form>
  </div>
</body>
</html>