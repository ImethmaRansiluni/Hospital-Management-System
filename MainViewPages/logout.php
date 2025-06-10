<?php
// Start the session
session_start();

// Destroy the session
session_unset(); // Clear all session variables
session_destroy(); // Destroy the session

// Clear the session cookie (in case it's causing issues with back button)
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 3600, '/');
}

// Redirect to the login page
header("Location: HomePage.php");
exit();
?>
