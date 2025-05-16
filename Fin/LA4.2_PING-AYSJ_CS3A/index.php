<?php
session_start(); // Start the session to store user data

// Check if the form was submitted via POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Save user input into the session
    $_SESSION['user'] = [
        'firstName' => $_POST['firstName'],
        'lastName' => $_POST['lastName'],
        'course' => $_POST['course'],
        'yearLevel' => $_POST['yearLevel'],
        'section' => $_POST['section'],
        'username' => $_POST['username'],
        'password' => $_POST['password'],
        'pinCode' => $_POST['pinCode']
    ];
    
    // Redirect to the confirmation page
    header("Location: registered.php");
    exit(); // Stop further execution
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <style>
        /* Reset box-sizing and remove default margin and padding for all elements */
        * {
            box-sizing: border-box;
            margin: 0px;
            padding: 0px;
        }

        /* Body styling: light blue background, Arial font, centered text */
        body {
            background-color: #f0f8ff;
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        /* Heading style: white text on dark blue background, centered vertically and horizontally, rounded top corners */
        h2 {
            color: white;
            margin-top: 30px;
            background: #081b5a;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-inline: auto;
            width: 100%;
            max-width: 500px;
            border-radius: 10px 10px 0 0; /* Rounded top corners */
        }

        /* Form container: white background, padding, rounded bottom corners, subtle shadow, centered with max width */
        form {
            background-color: white;
            padding: 30px;
            border-radius: 0 0 10px 10px; /* Rounded bottom corners */
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            display: inline-block;
            width: 100%;
            max-width: 500px;
        }

        /* Div elements inside form align text to left for labels and inputs */
        div {
            text-align: left;
        }

        /* Label styling: block display for stacking, dark blue color, small margin below */
        label {
            display: block;
            font-size: 14px;
            color: #081b5a;
            margin-bottom: 5px;
        }

        /* Text and password inputs: full width, padding, border with radius, consistent box-sizing */
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
        }

        /* Button styling: dark blue background, white text, full width, padding, rounded corners, pointer cursor */
        button {
            background-color: #081b5a;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
        }

        /* Button hover effect: lighter blue background */
        button:hover {
            background-color: #4a6cb1;
        }

        /* Paragraph text for errors: red and bold */
        p {
            color: red;
            font-weight: bold;
        }
    </style>

</head>
<body>
    <!-- Page Heading -->
    <h2>User Registration</h2>

    <!-- Registration Form -->
    <form method="post">
        <!-- First Name Input -->
        <div>
            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" required>
        </div><br>

        <!-- Last Name Input -->
        <div>
            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" required>
        </div><br>

        <!-- Course Input -->
        <div>
            <label for="course">Course:</label>
            <input type="text" id="course" name="course" required>
        </div><br>

        <!-- Year Level Input -->
        <div>
            <label for="yearLevel">Year Level:</label>
            <input type="text" id="yearLevel" name="yearLevel" required>
        </div><br>

        <!-- Section Input -->
        <div>
            <label for="section">Section:</label>
            <input type="text" id="section" name="section" required>
        </div><br>

        <!-- Username Input -->
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div><br>

        <!-- Password Input -->
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div><br>

        <!-- Pincode Input (up to 8 digits only) -->
        <div>
            <label for="pinCode">Pin Code (max 8 digits):</label>
            <input type="text" id="pincode" name="pinCode" pattern="\d{1,8}" maxlength="8" inputmode="numeric" required>
        </div><br>

        <!-- Submit Button -->
        <button type="submit">Register</button>
    </form>
</body>

</html>