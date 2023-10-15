<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Dashboard</title>
    <link rel="stylesheet" href=".\css\nav.css">
    <link rel="stylesheet" href=".\css\dashboard.css">
    <link rel="stylesheet" href=".\css\modal.css">
    <link rel="stylesheet" href=".\css\medical.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="shortcut icon" href="./images/logo.png" width="100px" height="100px" type="image/x-icon" />
</head>

<body>
    <?php require_once('nav.php'); ?>

    <?php

    if (isset($_SESSION['flashMessage'])) {
        $type = $_SESSION['flashMessage']['type'];
        $message = $_SESSION['flashMessage']['message'];
        echo '<div class="alert alert-' . $type . '">' . $message . '</div>';
        unset($_SESSION['flashMessage']); // Clear the flash message
    }

    // Check if the user is logged in as a doctor (you should have your authentication logic here)
    if (isset($_SESSION['role']) && $_SESSION['role'] === 'doctor') {
        // Database connection (replace with your database connection code)
        require_once("config.php");
        $conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASE);

        // Check for a successful connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve doctor details based on the logged-in doctor's information
        $doctorEmail = $_SESSION['email']; // You need to set the email during login

        // Create and execute a SQL query
        $sql = "SELECT * FROM team8.doctor WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $doctorEmail);
        $stmt->execute();
        $result = $stmt->get_result();
        $doctor = $result->fetch_assoc();
    }



    ?>


    <main>
        <div class="start-container">
            <div class="card">
                <h2>My Details</h2>
                <img src="<?= $doctor['profile'] ?>" alt="doctor">
                <p>Name: Dr <span id="doctorName"> <?= $doctor['name'] . " " . $doctor['surname'] ?> </span></p>
                <p>Specialization: <span id="doctorSpecialization"><?= $doctor['specialization'] ?></span></p>
                <p>Email: <span id="doctorEmail"><?= $doctor['email'] ?></span></p>
                <p>Phone Number: <span id="doctorNumber">0<?= $doctor['phone_number'] ?></span></p>
                <br>
                <a id="updateInfo" class="button">Update Profile</a>
                <a id="deleteInfo" class="button">Delete Profile</a>
            </div>


            <div class="card">
                <h2>My Patients </h2>

                <p> Patient Name: </p> <a href="medical_record.php" id="addInfo" class="button"> Add Diagnosis Record</a>


            </div>

            <div class="card">
                <h2>Reports </h2>

                <a href="#" id="reportInfo" class="button"> Generate Reports</a>


            </div>



        </div>

        <div id="updateInfoModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <h2>Update Information</h2>
                <form id="updateInfoForm" action="update.php" method="post" enctype="multipart/form-data" >

                    <label for="profilePicture">Profile Picture:</label>
                    <input type="file" id="profilePicture" name="profilePicture"  >

                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="<?= $doctor['name'] ?>" required>

                    <label for="surname">Surname:</label>
                    <input type="text" id="surname" name="surname" value="<?= $doctor['surname'] ?>" required>

                    <label for="specialization">Specialization:</label>
                    <input type="text" id="specialization" name="specialization" value="<?= $doctor['specialization'] ?>" required>

                    <label for="phone">Email:</label>
                    <input type="email" id="email" name="email" value="<?= $doctor['email'] ?>" required>

                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" name="phone" value="0<?= $doctor['phone_number'] ?>" required>

                    <input type="submit" name="submit" value="Update">
                </form>
            </div>
        </div>

        <div id="deleteConfirmationModal" class="modal deleteModal">
            <div class="modal-content">
                <span class="close" onclick="closeDeleteModal()">&times;</span>
                <h2>Delete Profile</h2>
                <p>Are you sure you want to delete your profile? This action is irreversible.</p>
                <form id="deleteInfoForm" action="delete.php" method="post">
                    <input type="password" id="deletePassword" name="password" placeholder="Enter your password" required>

                    <input type="hidden" name="email" value="<?= $doctor['email'] ?>">
                    <input type="submit" class="button" name="submit" value="Confirm Delete">

                    <!-- <button id="confirmDelete" class="button" onclick="submitDeleteForm()">Confirm Deletion</button> -->
            </div>




            </form>
        </div>


        <?php include_once("footer.php") ?>
    </main>
    <script src=" .\js\delete.js"></script>
    <script src=" .\js\update.js"></script>
    <script src=" .\js\scroll.js"></script>
    <script src=" .\js\navigator.js"></script>
</body>

<?php
// Close the database connection
$stmt->close();
$conn->close();
?>

</html>