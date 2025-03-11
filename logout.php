<?php
session_start();

// Destroy the sessions
session_unset();
session_destroy();

// Redirect to login page
header('Location: login.php');
exit;
?>
