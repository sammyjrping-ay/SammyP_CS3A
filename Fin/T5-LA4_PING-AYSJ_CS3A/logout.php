<?php
// Start session
session_start();

// Destroy all session data (log out user)
session_destroy();

// Redirect to login page
header("Location: index.php");
