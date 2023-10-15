<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href=".\css\nav.css">
    <link rel="stylesheet" href=".\css\examples.css">
    <link rel="stylesheet" href=".\css\modal.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="shortcut icon" href="./images/logo.png" width="100px" height="100px" type="image/x-icon" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>


</head>

<body>
    <?php include_once('nav.php'); ?>

    <div class="main-container">
        <section id="section1" class="first-section">
            <div class="image-container">
                <img src="images/bg_2.jpg" alt="Doctors">
                <div class="overlay"></div>
                <div class="text-overlay">
                    <h1>Qualified Doctors</h1>

                </div>
            </div>
        </section>


        <?php
// Include your database configuration file
require_once("config.php");

// Create a database connection
$conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASE);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to select all doctors
$sql = "SELECT * FROM team8.doctor";
$result = $conn->query($sql);

// Counter for sections
$sectionNumber = 1;

if ($result->num_rows > 0) {
    // Output the first section and card container
    echo '<section id="section' . $sectionNumber . '">';
    echo '<div class="card-container">';

    $cardCount = 0; // Initialize the card count

    while ($row = $result->fetch_assoc()) {
        // Generate HTML for each doctor's card
        echo '<div class="card">';
        echo '<img class="lim" src="' . $row['profile'] . '" alt="' . $row['name'] . '">';
        echo '<h1 class="lim">'. 'Dr ' . $row['surname'] . '</h1>';
        echo '<p class="title">' . $row['specialization'] . '</p>';
        echo '<p>0' . $row['phone_number'] . '</p>';
        echo '<div>';
        echo '<a href="#"><i class="fa fa-dribbble"></i></a>';
        echo '<a href="#"><i class="fa fa-twitter"></i></a>';
        echo '<a href="#"><i class "fa fa-linkedin"></i></a>';
        echo '<a href="#"><i class="fa fa-instagram"></i></a>';
        echo '</div>';
        echo '<p><a href="appointment.php"><button class="lim">Book</button></a></p>';
        echo '</div>';

        // Increment the card count
        $cardCount++;

        // Check if it's time to start a new section and card container
        if ($cardCount % 3 === 0) {
            echo '</div>'; // Close the current card container
            echo '</section>'; // Close the current section
            $sectionNumber++;

            if ($sectionNumber > 1) {
                echo '</div>'; // Close the previous card container
            }
    
            // Output section and card container
            echo '<section id="section' . $sectionNumber . '">';
            echo '<div class="card-container">';
        }
    }

    // Close the last card container and section
    echo '</div>'; // Close the last card container
    echo '</section>'; // Close the last section
} else {
    echo "No doctors found.";
}

// Close the database connection
$conn->close();
?>




        <section id="section4">
            <div class="stories">
                <h2>
                    Results of our Treatment and work
                </h2>
            </div>
        </section>

        <section id="section5">
            <div class="feedbackContainer">
                <div class="responsive ">

                    <div class="person">
                        <a target="_blank">

                            <img src="images/patient5.jpg" alt="Cinque Terre">
                        </a>
                    </div>
                </div>


                <div class="responsive">

                    <div class="person">
                        <a target="_blank">

                            <img src="images/patient3.jpg" alt="Forest">
                        </a>

                    </div>
                </div>

                <div class="responsive">

                    <div class="person">
                        <a target="_blank">

                            <img src="images/patient2.jpg" alt="Northern Lights">
                        </a>

                    </div>
                </div>

                <div class="responsive">

                    <div class="person">
                        <a target="_blank">

                            <img src="images/patient6.jpg" alt="Mountains">
                        </a>

                    </div>
                </div>

            </div>
        </section>
        <?php require_once('login.php'); ?>
        <?php include_once('register.php'); ?>
    </div>

    <section id="section6">
        <?php include_once('footer.php'); ?>
    </section>

    <script src=".\js\navigator.js"></script>
    <script src=".\js\scroll.js"></script>
    <script src=".\js\loading.js"></script>
    <script src=".\js\parallaxDoctors.js"></script>
    <script src=".\js\register.js"></script>

    <script src=".\js\login.js"></script>

</body>

</html>