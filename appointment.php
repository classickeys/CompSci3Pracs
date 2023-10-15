<?php require_once('auth.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>RKMcare</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=".\css\nav.css">
    <link rel="stylesheet" href=".\css\appointment.css">

    <link rel="stylesheet" href=".\css\modal.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="shortcut icon" href="./images/logo.png" width="100px" height="100px" type="image/x-icon" />


</head>

<body>
    <?php include_once('nav.php'); ?>
    <div class="main-container">


        <section id="section1" class="first-section">

            <div class="image-container">
                <img src="images/doctAptmnt.jpg" alt="doctors Appointment">
                <div class="overlay"></div>
                <div class="text-overlay">
                    <h1>Appointments made easy</h1>
                    <p>Get assistance with finding a healthcare provider and book for consultations online.
                        <br>Select a healthcare professional below to start the process.
                    </p>

                </div>
            </div>
        </section>
        <div class="main-container">
            <div class="appointments">
                <h2>Book an Appointment</h2>
                <table>
                    <tr>
                        <th>Doctor</th>
                        <th>Specialty</th>
                        <th>Available Slots</th>
                        <th>Book Appointment</th>
                    </tr>
                    <tr>
                        <td>Dr. Smith</td>
                        <td>Cardiologist</td>
                        <td>Mon 10:00 AM, Wed 3:00 PM</td>
                        <td><button class="book-button" data-doctor="Dr. Smith" data-specialty="Cardiologist"
                                data-time-slots="Mon 10:00 AM,Wed 3:00 PM">Book Now</button></td>
                    </tr>
                    <tr>
                        <td>Dr. Johnson</td>
                        <td>Pediatrician</td>
                        <td>Tue 2:00 PM, Thu 11:00 AM</td>
                        <td><button class="book-button" data-doctor="Dr. Johnson" data-specialty="Pediatrician"
                                data-time-slots="Tue 2:00 PM,Thu 11:00 AM">Book Now</button></td>
                    </tr>
                    <tr>
                        <td>Dr. Davis</td>
                        <td>Orthopedic Surgeon</td>
                        <td>Wed 9:30 AM, Fri 4:00 PM</td>
                        <td><button class="book-button" data-doctor="Dr. Davis" data-specialty="Orthopedic Surgeon"
                                data-time-slots="Wed 9:30 AM,Fri 4:00 PM">Book Now</button></td>
                    </tr>
                    <tr>
                        <td>Dr. Wilson</td>
                        <td>Dermatologist</td>
                        <td>Thu 1:00 PM, Fri 2:30 PM</td>
                        <td><button class="book-button" data-doctor="Dr. Wilson" data-specialty="Dermatologist"
                                data-time-slots="Thu 1:00 PM,Fri 2:30 PM">Book Now</button></td>
                    </tr>
                    <tr>
                        <td>Dr. White</td>
                        <td>General Practitioner (GP)</td>
                        <td>Mon 9:00 AM, Tue 3:30 PM</td>
                        <td><button class="book-button" data-doctor="Dr. White"
                                data-specialty="General Practitioner (GP)"
                                data-time-slots="Mon 9:00 AM,Tue 3:30 PM">Book Now</button></td>
                    </tr>
                </table>
            </div>

            <!-- The modal for booking appointments -->
            <div id="appointment-modal" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closeAppointmentModal()">&times;</span>
                    <h2>Enter your details here</h2>
                    <form id="appointment-form">
                        <!-- Your form content here -->
                        <label for="doctor">Doctor:</label>
                        <input type="text" id="doctor" name="doctor" readonly>

                        <label for="specialty">Specialty:</label>
                        <input type="text" id="specialty" name="specialty" readonly>

                        <label for="time-slots">Available Slots:</label>
                        <select id="time-slots" name="time-slots">
                            <!-- Add options for available time slots here -->
                            <option value="Mon 10:00 AM">Mon 10:00 AM</option>
                            <option value="Wed 3:00 PM">Wed 3:00 PM</option>
                            <!-- Add more options for other time slots as needed -->
                        </select>

                        <label for="name">Your Name:</label>
                        <input type="text" id="name" name="name" required>

                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required
                            pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$"
                            title="Please enter a valid email address">

                        <label for="phone">Phone Number:</label>
                        <input type="tel" id="phone" name="phone" required pattern="^\d{10}$"
                            title="Please enter a valid 10-digit phone number">

                        <label for="app_date">appointment_date:</label>
                        <input type="app_date" id="app_date" name="app_date" required>
                        <input type="hidden" name="csrf_token" value="random_token_generated_on_server">


                        <input type="submit" name="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
        <?php include_once('register.php'); ?>


        <?php include_once('footer.php'); ?>



        <script src=".\js\appointment.js"></script>
        <script src=".\js\scroll.js"></script>
        <script src=".\js\loading.js"></script>
        <script src=".\js\navigator.js"></script>
        <script src=".\js\register.js"></script>
</body>

</html>

<?php
require_once("config.php"); // Include your database connection code here
session_start(); // Initialize the session (if not already done)

// Initialize an empty array to collect error messages
$errors = [];

// Handle appointment submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $app_date = $_POST["time-slots"];
    $status = "Pending"; // You can set the initial status here
    
    // Validate name (should not be empty)
    if (empty($name)) {
        $errors[] = "Name is required.";
    }

    // Validate email (using HTML5 pattern)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }

    // Validate phone number (10 digits)
    if (!preg_match('/^\d{10}$/', $phone)) {
        $errors[] = "Please enter a valid 10-digit phone number.";
    }

    if (empty($errors)) {
        // If there are no errors, you can proceed to process the form data

        // Check the database connection
        $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Prepare and execute the SQL statement to insert the data
        $sql = "INSERT INTO appointment (name, email, phone, appointment_date, status) VALUES (?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $name, $email, $phone, $app_date, $status);

        if ($stmt->execute()) {
            // Data inserted successfully
            echo "Form submitted and data inserted into the database!";
        } else {
            // Error occurred while inserting data
            $errors[] = "Error: " . $stmt->error;
        }

        // Close the database connection
        $stmt->close();
        $conn->close();
    }
}

// Display validation errors, if any
if (!empty($errors)) {
    echo "<h2>Validation Errors:</h2>";
    foreach ($errors as $error) {
        echo "<p>$error</p>";
    }
}
?>
<?php
// Include your database connection code here
require_once("config.php");

// Check if a doctor is logged in
if (isset($_SESSION['doctor_id'])) {
    $doctor_id = $_SESSION['doctor_id'];

    // Query to retrieve appointments for the authenticated doctor
    $sql = "SELECT * FROM appointments WHERE doctor_id = ? ORDER BY appointment_date";

    // Prepare and execute the query
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $doctor_id);
    if (!$stmt->execute()) {
        echo "Error executing the query: " . $stmt->error;
    } else {
        $result = $stmt->get_result();

        // Display the appointments
        echo "<h2>Your Appointments</h2>";
        if ($result->num_rows > 0) {
            echo "<ul>";
            while ($row = $result->fetch_assoc()) {
                echo "<li>";
                echo "Date: " . $row['appointment_date'] . "<br>";
                echo "Patient ID: " . $row['patient_id'] . "<br>";
                echo "Description: " . $row['description'] . "<br>";
                echo "</li>";
            }
            echo "</ul>";
        } else {
            echo "No appointments found.";
        }
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
} else {
    echo "Please log in as a doctor to view appointments.";
}
?>
