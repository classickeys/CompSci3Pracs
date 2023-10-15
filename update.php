<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database configuration file
    require_once("config.php");

    // Create a database connection
    $conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASE);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Handle file upload

    echo '<pre>';
    print_r($_FILES);
    echo '</pre>';


    $uploadDir = "images/profile/"; // Define your upload directory
    $uploadFile = $uploadDir . 'SP' . substr(time(), -5) . basename($_FILES['profilePicture']['name']);

    if (move_uploaded_file($_FILES['profilePicture']['tmp_name'], $uploadFile)) {
        // File uploaded successfully, now update the database
        $profilePicture = $uploadFile;

        // Prepare and bind the update statement with a prepared statement
        $stmt = $conn->prepare("UPDATE team8.doctor SET name=?, surname=?, phone_number=?, specialization=?, profile=? WHERE email = ?");
        $stmt->bind_param("ssssss", $name, $surname, $phone, $specialization, $profilePicture, $email);

        // Set parameters
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $phone = $_POST['phone'];
        $specialization = $_POST['specialization'];
        $email = $_POST['email']; // Use the email to identify the record to update

        // Execute the update
        if ($stmt->execute()) {
            echo "Profile picture successfully updated!";
            header("Location: dashboard.php");
        } else {
            // Trigger a user-friendly error message
            echo "Error updating record: " . $stmt->error;
            // Log the error
            error_log("Error updating profile picture: " . $stmt->error);
        }

        // Close the statement
        $stmt->close();
    } else {
        // Handle the file upload error
        echo "Error uploading the profile picture.";
        // Log the error
        error_log("Error uploading profile picture: File move_uploaded_file failed.");
    }
}
