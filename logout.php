<?php
session_start();
$_SESSION = array(); // Clear session variables
session_unset();  // Unset all session variables	
setcookie(session_name(), '', time() - 3600, '/'); // Expire session cookie
// Destroy session
session_destroy();

// Prevent caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: 0");

// Redirect to login page
header("Location: index.php");
exit();
?>