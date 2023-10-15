<?php

session_start(); // Start a new or resume an existing session

require_once("config.php");
$conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASE);

// Check for a successful connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user-provided email and password from the login form
if (isset($_POST['email']) && isset($_POST['password'])) {
    $userEmail = $_POST['email'];
    $userPassword = $_POST['password'];

    // Retrieve the hashed password from the database based on the provided email
    $sql = "SELECT email, password, role FROM team8.user WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $userEmail);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        // Compare the hashed password from the database with the hashed user-provided password
        if (password_verify($userPassword, $user['password'])) {
            // Passwords match; user is authenticated
            // Store the user's role in the session
            $_SESSION['role'] = $user['role'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['login'] = true;

            // Redirect to a specific page, e.g., dashboard.php
            header('Location: dashboard.php');
            exit(); // Terminate script execution after redirect

        } else {
            // Passwords do not match
            $error_message = "Invalid password";
        }
    } else {
        // User with the provided email not found
        $error_message = "User not found";
    }

    // Close the database connection
    $stmt->close();
} else {
    // Handle cases where email and password are not provided
    $error_message = "Please provide both email and password";
}

// Display error message, if any
if (isset($error_message)) {
    echo "Login failed: " . $error_message;
}

$conn->close(); // Close the database connection if it's not already closed
?>
