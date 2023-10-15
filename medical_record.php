<?php
$record = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize form inputs
    $patientName = $_POST["patientName"];
    $patientSurname = $_POST["patientSurname"];
    $dateOfBirth = $_POST["dateOfBirth"];
    $gender = $_POST["gender"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $symptoms = $_POST["symptoms"];
    $diagnosis = isset($_POST["diagnosis"]) ? $_POST["diagnosis"] : "No diagnosis provided";
    $treatment = $_POST["treatment"];

    // Database connection details
    require_once("config.php");

    // Create a database connection
    $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL query
    $sql = "INSERT INTO team8.medical_records (patientName, patientSurname, dateOfBirth, gender, address, phone, email,symptoms, diagnosis, treatment)
     VALUES ($patientName, $patientSurname, $dateOfBirth, $gender, $address, $phone, $email,$symptoms, $diagnosis, $treatment)";

    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind parameters
        $stmt->bind_param("sssssssss", $patientName, $patientSurname, $dateOfBirth, $gender, $address, $phone, $email,$symptoms, $diagnosis, $treatment);

        // Execute the SQL query
        if ($stmt->execute()) {
            echo "Data submitted successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the database connection
        $stmt->close(); 
        $conn->close();
    } else {
        echo "Error in preparing the SQL statement: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Medical Record Page</title>
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="./css/modal.css">
    <link rel="shortcut icon" href="./images/logo.png" type="image/x-icon">
</head>

<body>
    <?php include_once('nav.php'); ?>

    <div>
        <div class="modal-content">
            <h1>Patient Record</h1>
            <form id="medicalRecordForm" action="medical_record.php" method="post">
                <h2>Patient Information:</h2>
                <label for="patientName">Patient Name:</label>
                <input type="text" id="patientName" name="patientName" required><br>

                <label for="patientSurname">Patient Surname:</label>
                <input type="text" id="patientSurname" name="patientSurname" required><br>

                <label for="dateOfBirth">Date of Birth:</label>
                <input type="date" id="dateOfBirth" name="dateOfBirth" required><br>

                <label>Gender:</label>
                <input type="radio" id="male" name="gender" value="Male">
                <label for="male">Male</label>
                <input type="radio" id="female" name="gender" value="Female">
                <label for="female">Female</label>
                <input type="radio" id="other" name="gender" value="Other">
                <label for="other">Other</label><br>

                <h2>Contact Information:</h2>
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required><br>

                <label for="phone">Phone:</label>
                <input type="tel" id="phone" name="phone" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br>

                <!-- Medical assessment by the doctor -->
                <h2>Symptoms:</h2>
                <label for="symptoms">Description of the patient's primary concern and symptoms:</label><br>
                <textarea id="symptoms" name="symptoms" rows="4" cols="50"></textarea><br>

                <h2>Medical Assessment:</h2>
                <label for="diagnosis">Diagnosis:</label>
                <textarea id="diagnosis" name="diagnosis" rows="4" cols="50" required></textarea><br>

                <label for="treatment">Treatment Plan:</label>
                <textarea id="treatment" name="treatment" rows="4" cols="50" required></textarea><br>

                <input type="submit" value="Submit">
            </form>
        </div>
    </div>

    <?php include_once('footer.php'); ?>

    <script src="./js/scroll.js"></script>
</body>

</html>