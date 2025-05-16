<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
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
    header("Location: registered.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0px;
            padding: 0px;
        }
        body {
            background-color: #f0f8ff; 
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
            text-align: center;
        }
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
            border-radius: 10px 10px 0px 0px;
        }
        form {
            background-color: white;
            padding: 30px;
            border-radius: 0px 0px 10px 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            display: inline-block;
            width: 100%;
            max-width: 500px;
        }
        div {
            text-align: left;
        }
        label {
            display: block;
            font-size: 14px;
            color: #081b5a;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
        }
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
        button:hover {
            background-color: #4a6cb1; 
        }
        p {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h2>User Registration</h2>
    <form method="post">
        <div>
            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" required>
        </div><br>

        <div>
            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" required>
        </div><br>

        <div>
            <label for="course">Course:</label>
            <input type="text" id="course" name="course" required>
        </div><br>

        <div>
            <label for="yearLevel">Year Level:</label>
            <input type="text" id="yearLevel" name="yearLevel" required>
        </div><br>

        <div>
            <label for="section">Section:</label>
            <input type="text" id="section" name="section" required>
        </div><br>

        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div><br>

        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div><br>

        <div>
            <label for="pinCode">Pin Code (max 8 digits):</label>
            <input type="text" id="pincode" name="pinCode" pattern="\d{1,8}" maxlength="8" inputmode="numeric" required>
        </div><br>
        <button type="submit">Register</button>
    </form>
</body>
</html>