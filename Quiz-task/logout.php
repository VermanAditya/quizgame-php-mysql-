<?php
error_reporting(E_ALL ^ E_NOTICE);
// Initialize the session
session_start();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: index.php");
exit;
?>