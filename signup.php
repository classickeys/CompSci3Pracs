<!DOCTYPE html>
<html>

<head>
    <title>Sign Up</title>
</head>
<?php

require_once("config.php");

// Define a function for custom error handling
function customErrorHandler($errno, $errstr, $errfile, $errline) {
    // Log the error (you can customize this part to log errors as needed)
    error_log("Error [$errno]: $errstr in $errfile on line $errline");

    // Display a user-friendly error message
    echo "An error occurred while processing your request. Please try again later or contact support.";

    // You can redirect the user to an error page if needed
    // header("Location: error.php");
}

// Set the custom error handler
set_error_handler("customErrorHandler");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['firstName'];
    $last_name = $_POST['surname'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone'];
    $role = $_POST['role'];
    $password = $_POST['password'];
    $profile = ".\images\profile\doc9.png";

    // Additional fields for patients and doctors
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $specialization = isset($_POST['specialization']) ? $_POST['specialization'] : '';

    // Hash the password using bcrypt.
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Connect to the database using mysqli.
    $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE);

    if ($conn->connect_error) {
        // Trigger a user-friendly error message
        trigger_error("Database connection error: " . $conn->connect_error, E_USER_ERROR);
    }

    // Prepare and execute a SQL statement with a prepared statement.
    $query = $conn->prepare("INSERT INTO team8.user (role, email, password) VALUES (?, ?, ?)");
    $query->bind_param('sss', $role, $email, $hashed_password);

    //doctor
    $query1 = $conn->prepare("INSERT INTO team8.doctor ( name, surname, phone_number , email, specialization, profile) VALUES (?, ?, ?, ?, ?,?)");
    $query1->bind_param('ssssss', $first_name, $last_name, $phone_number, $email, $specialization, $profile);

    //patient
    $query2 = $conn->prepare("INSERT INTO team8.patient ( patientName, patientSurname, phone_number, address,  email, gender) VALUES (?, ?, ?, ?, ?, ?)");
    $query2->bind_param('ssssss', $first_name, $last_name, $phone_number, $address, $email, $gender);

    if ($role == 'doctor') {
        if ($query->execute()) {
            if ($query1->execute()) {
                header("Location: index.php");
            }
        }
    } else if ($role == 'patient') {
        if ($query->execute()) {
            if ($query2->execute()) {
                header("Location: appointment.php");
            }
        }
    } else {
        // Trigger a user-friendly error message for general registration failure
        trigger_error("User registration failed: " . $query->error, E_USER_ERROR);
    }

    $query->close();
    $conn->close();
}

// Restore the default error handler (optional)
restore_error_handler();
?>


<!DOCTYPE html>
<html>
<style>
    .password-toggle {
        position: relative;
    }

    .password-toggle input[type="password"] {
        padding-right: 30px;
    }

    .password-toggle .toggle-password {
        position: absolute;
        top: 0;
        right: 0;
        cursor: pointer;
        padding: 5px;
    }
</style>
<body>
    <h2>Sign Up</h2>
    <form action="signup.php" method="post">
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" required value="<?php echo isset($first_name) ? htmlspecialchars($first_name) : ''; ?>"><br>

        <label for="surname">Last Name:</label>
        <input type="text" id="surname" name="surname" required value="<?php echo isset($last_name) ? htmlspecialchars($last_name) : ''; ?>"><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>"><br>

        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required value="<?php echo isset($phone_number) ? htmlspecialchars($phone_number) : ''; ?>"><br>

        <label for="role">Role:</label>
        <select id="role" name="role">
            <option value="doctor">Doctor</option>
            <option value="patient">Patient</option>
        </select><br>

        <!-- Additional fields for patients and doctors -->
        <div id="doctor-fields" style="display: none;">
            <label for="specialization">Specialization:</label>
            <input type="text" id="specialization" name="specialization" value="<?php echo isset($specialization) ? htmlspecialchars($specialization) : ''; ?>"><br>
        </div>
        <div id="patient-fields" style="display: none;">
            <label for="gender">Gender:</label>
            <input type="text" id="gender" name="gender" value="<?php echo isset($gender) ? htmlspecialchars($gender) : ''; ?>"><br>
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="<?php echo isset($address) ? htmlspecialchars($address) : ''; ?>"><br>
        </div>

        <div class="password-toggle">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <span class="toggle-password" onclick="togglePasswordVisibility(this)">&#x1F441;</span>
        </div>

        <input type="submit" value="Submit">
    </form>

    <script>
        // Show additional fields based on the selected role
        document.getElementById('role').addEventListener('change', function () {
            const selectedRole = this.value;
            if (selectedRole === 'doctor') {
                document.getElementById('doctor-fields').style.display = 'block';
                document.getElementById('patient-fields').style.display = 'none';
            } else if (selectedRole === 'patient') {
                document.getElementById('doctor-fields').style.display = 'none';
                document.getElementById('patient-fields').style.display = 'block';
            } else {
                document.getElementById('doctor-fields').style.display = 'none';
                document.getElementById('patient-fields').style.display = 'none';
            }
        });
    </script>
    <script>
        function togglePasswordVisibility(element) {
            var passwordInput = element.parentElement.querySelector('input[type="password"]');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                element.innerHTML = '&#x1F440;';
            } else {
                passwordInput.type = 'password';
                element.innerHTML = '&#x1F441;';
            }
        }
    </script>
</body>

</html>
