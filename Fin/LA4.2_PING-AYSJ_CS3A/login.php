<?php
session_start(); // Start the session to access stored user data

// Redirect to registration page if user data is not set
if (!isset($_SESSION['user'])) {
    header("Location: register.php");
    exit();
}

$login_error = $pin_error = ""; // Initialize error messages
$step = "login"; // Default step is login

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // First step: verify username and password
    if (isset($_POST['username'])) {
        // Check if credentials match the session data
        if ($_POST['username'] === $_SESSION['user']['username'] && $_POST['password'] === $_SESSION['user']['password']) {
            $step = "pin"; // Move to pin verification step
        } else {
            $login_error = "Invalid username or password."; // Set login error
        }

    // Second step: verify pin code
    } elseif (isset($_POST['pinCode'])) {
        // Check if pin code matches
        if ($_POST['pinCode'] === $_SESSION['user']['pinCode']) {
            $step = "done"; // Login process completed
        } else {
            $pin_error = "Incorrect pin code."; // Set pin error
            $step = "pin"; // Stay on pin step
        }
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        /* Reset box model and remove default margin/padding */
        * {
            box-sizing: border-box;
            margin: 0px;
            padding: 0px;
        }

        /* Body styling: light background, centered content, vertical layout */
        body {
            background-color: #f0f8ff; 
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            height: 90vh; /* Almost full viewport height */
        }

        /* Heading style: white text on dark blue background, centered */
        h2 {
            color: white; 
            margin-top: 50px;
            height: 60px;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            max-width: 500px;
            background-color: #081b5a;
            margin-inline: auto;
            border-radius: 8px 8px 0 0; /* Rounded top corners */
        }

        /* Form container with white background, padding and subtle shadow */
        form {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: inline-block;
            width: 100%;
            max-width: 500px;
        }

        /* Text and password input styling with padding and border radius */
        input[type="text"], input[type="password"] {
            width: 340px;
            padding: 8px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        /* Button style: dark blue background, white text, rounded corners */
        button {
            background-color: #081b5a; 
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            width: 93%;
        }

        /* Button hover effect: lighter blue */
        button:hover {
            background-color: #4a6cb1; 
        }

        /* Paragraph for errors or alerts: red bold text, centered */
        p {
            color: red;
            font-weight: bold;
            padding-top: 3px;
            padding-bottom: 8px;
            text-align: center;
        }

        /* Strong tag color for emphasis */
        strong {
            color: #081b5a;
            margin-right: 5px;
        }

        /* Label styling: block layout, margin for spacing, smaller font */
        label {
            display: block;
            margin-top: 10px;
            font-size: 14px;
        }

        /* Unordered list styling: white background with padding, centered, subtle shadow */
        ul {
            text-align: left;
            margin: 0 auto;
            display: inline-block;
            background-color: white;
            padding: 10px 40px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        /* List item style: spacing and no bullet points */
        li {
            padding: 7px 0;
            list-style: none;
        }
    </style>

</head>
<body>
    <!-- Step 1: Login Form -->
    <?php if ($step === "login"): ?>
        <h2>Login</h2>
        <form method="post">
            <!-- Display login error if any -->
            <?php if ($login_error) echo "<p>$login_error</p>"; ?>
            
            <!-- Username input -->
            Username: <input type="text" name="username" required><br><br>
            
            <!-- Password input -->
            Password: <input type="password" name="password" required><br><br>
            
            <!-- Submit button -->
            <button type="submit">Next</button>
        </form>

    <!-- Step 2: Pin Code Verification -->
    <?php elseif ($step === "pin"): ?>
        <h2>Enter Pin Code</h2>
        <form method="post">
            <!-- Display pin error if any -->
            <?php if ($pin_error) echo "<p style='color:red;'>$pin_error</p>"; ?>
            
            <!-- Pin code input -->
            Pin Code: <input type="text" name="pinCode" required><br><br>
            
            <!-- Submit button -->
            <button type="submit">Login</button>
        </form>

    <!-- Step 3: Successful Login -->
    <?php else: ?>
        <h2>Login Successful!</h2>

        <!-- Display welcome message and registered user data -->
        <ul>
            <p style="color: #081b5a;">Welcome, <?php echo $_SESSION['user']['firstName']; ?>! Here is your registered information:</p>
            
            <?php
            // Loop through each piece of user data and display it
            foreach ($_SESSION['user'] as $key => $value) {
                echo "<li><strong>" . ucfirst($key) . ":</strong> $value</li>";
            }
            ?>
        </ul>
    <?php endif; ?>
</body>
</html>
