<?php
session_start();

// Check if the user is authenticated
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to the login page if not authenticated
    exit();
}
?>
