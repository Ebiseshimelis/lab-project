<?php
session_start();

// destroy all session data
session_unset();
session_destroy();

// redirect back to login page
header("Location: /login-and-registration/login.php");
exit();
?>