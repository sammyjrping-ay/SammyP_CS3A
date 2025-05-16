<!DOCTYPE html>
<html>
<head>
    <title>Registered</title>
    <style>
        /* Reset box-sizing and remove default margin and padding for all elements */
        * {
            box-sizing: border-box;
            margin: 0px;
            padding: 0px;
        }

        /* Body styling: light background, center content vertically and horizontally, use column layout */
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

        /* Heading style: white text on dark blue background, centered with some margin and rounded top corners */
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

        /* Form container: white background, padding, rounded bottom corners, and subtle shadow */
        form {
            background-color: white;
            padding: 20px;
            border-radius: 0 0 8px 8px; /* Rounded bottom corners */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: inline-block;
            width: 100%;
            max-width: 500px;
        }

        /* Paragraph text styling: dark color with normal weight and vertical padding */
        p {
            color: #333;
            font-weight: normal;
            padding-top: 10px;
            padding-bottom: 15px;
        }

        /* Container for links: flex layout spaced evenly */
        .link-container {
            display: flex;
            justify-content: space-around;
            margin-top: 10px;
        }

        /* Links styling: no underline, dark blue background, white text, padding, rounded corners */
        .link-container a {
            text-decoration: none;
            background-color: #081b5a;
            color: white;
            padding: 10px 20px;
            border-radius: 4px;
            font-size: 16px;
            transition: background-color 0.3s ease; /* Smooth hover effect */
        }

        /* Hover effect for links: lighter blue background */
        .link-container a:hover {
            background-color: #4a6cb1;
        }
    </style>

</head>
<body>
    <!-- Success message header -->
    <h2>🎉 Registration Successful!</h2>

    <!-- Form asking if the user wants to log in -->
    <form method="GET" action="login.php">
        <!-- Confirmation message -->
        <p>Congratulations! You have successfully registered.</p>

        <!-- Prompt to log in -->
        <p>Do you want to log in?</p>

        <!-- Links for user's choice: Yes or No -->
        <div class="link-container">
            <a href="index.php">No</a>     <!-- Redirect to home if No -->
            <a href="login.php">Yes</a>    <!-- Redirect to login page if Yes -->
        </div>
    </form>
</body>
</html>
