<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Patient</title>
</head>

<body>

    <h2>Add Patient</h2>

    <form action="process_patient.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required><br><br>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select><br><br>

        <label for="address">Address:</label>
        <textarea id="address" name="address" rows="4" cols="50" required></textarea><br><br>

        <input type="submit" value="Add Patient">
    </form>

</body>

</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Replace these values with your actual database credentials
    require_once("config.php");
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Sanitize and validate form inputs
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    // Insert patient record
    $query_insert_patient = "INSERT INTO patients (name, dob, gender, address)
                             VALUES ('$name', '$dob', '$gender', '$address')";

    if ($conn->query($query_insert_patient) === TRUE) {
        echo "Patient added successfully!";
    } else {
        echo "Error: " . $query_insert_patient . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>