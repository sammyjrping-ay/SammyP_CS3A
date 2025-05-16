<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: register.php");
    exit();
}

$login_error = $pin_error = "";
$step = "login"; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['username'])) {
        if ($_POST['username'] === $_SESSION['user']['username'] && $_POST['password'] === $_SESSION['user']['password']) {
            $step = "pin";
        } else {
            $login_error = "Invalid username or password.";
        }
    } elseif (isset($_POST['pinCode'])) {
        if ($_POST['pinCode'] === $_SESSION['user']['pinCode']) {
            $step = "done";
        } else {
            $pin_error = "Incorrect pin code.";
            $step = "pin";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0px;
            padding: 0px
        }
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
            height: 90vh;
        }
        h2 {
            color: white; 
            margin-top: 50px;
            height: 60px;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 250px;
            background-color: #081b5a;
            margin-inline: auto;
            width: 100%;
            max-width: 500px;
            border-radius: 8px 8px 0px 0px;
        }
        form {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: inline-block;
            width: 100%;
            max-width: 500px;
        }
        input[type="text"], input[type="password"] {
            width: 340px;
            padding: 8px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }
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
        button:hover {
            background-color: #4a6cb1; 
        }
        p {
            color: red;
            font-weight: bold;
            padding-top: 3px;
            padding-bottom: 8px;
            text-align: center;
        }
        strong {
            color: #081b5a;
            margin-right: 5px;
        }
        label {
            display: block;
            margin-top: 10px;
            font-size: 14px;
        }
        ul {
            text-align: left;
            margin: 0px auto;
            display: inline-block;
            background-color: white;
            padding: 10px 40px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }
        li {
            padding: 7px 0;
            list-style: none;
        }
    </style>
</head>
<body>
    <?php if ($step === "login"): ?>
        <h2>Login</h2>
        <form method="post">
            <?php if ($login_error) echo "<p>$login_error</p>"; ?>
            Username: <input type="text" name="username" required><br><br>
            Password: <input type="password" name="password" required><br><br>
            <button type="submit">Next</button>
        </form>

    <?php elseif ($step === "pin"): ?>
        <h2>Enter Pin Code</h2>
        <form method="post">
            <?php if ($pin_error) echo "<p style='color:red;'>$pin_error</p>"; ?>
            Pin Code: <input type="text" name="pinCode" required><br><br>
            <button type="submit">Login</button>
        </form>

    <?php else: ?>
        <h2>Login Successful!</h2>
        <ul>
            <p style="color: #081b5a;">Welcome, <?php echo $_SESSION['user']['firstName']; ?>! Here is your registered information:</p>
            <?php
            foreach ($_SESSION['user'] as $key => $value) {
                echo "<li><strong>" . ucfirst($key) . ":</strong> $value</li>";
            }
            ?>
        </ul>
    <?php endif; ?>
</body>
</html>
