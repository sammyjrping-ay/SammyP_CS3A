<!DOCTYPE html>
<html>
<head>
    <title>Registered</title>
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
            border-radius: 0px 0px 8px 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: inline-block;
            width: 100%;
            max-width: 500px;
        }
        p {
            color: #333;
            font-weight: normal;
            padding-top: 10px;
            padding-bottom: 15px;
        }
        .link-container {
            display: flex;
            justify-content: space-around;
            margin-top: 10px;
        }
        .link-container a {
            text-decoration: none;
            background-color: #081b5a;
            color: white;
            padding: 10px 20px;
            border-radius: 4px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .link-container a:hover {
            background-color: #4a6cb1;
        }
    </style>
</head>
<body>
    <h2>🎉 Registration Successful!</h2>
    <form method="GET" action="login.php">
        <p>Congratulations! You have successfully registered.</p>
        <p>Do you want to log in?</p>
        <div class="link-container">
            <a href="index.php">No</a>
            <a href="login.php">Yes</a>
        </div>
    </form>
</body>
</html>
