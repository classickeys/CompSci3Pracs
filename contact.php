<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>RKMcare</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=".\css\contact.css">
    <link rel="stylesheet" href=".\css\nav.css">
    <link rel="stylesheet" href=".\css\modal.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="shortcut icon" href="./images/logo.png" width="10px" height="10px" type="image/x-icon" />
    <script src=".\js\contact.js"></script>
</head>

<body>
    <?php include_once('nav.php'); ?>


    <div class="main-container">


        <section id="section1" class="first-section">
            <div class="image-container">
                <img src="images/callCenter.jpg" alt="callCenter">
                <div class="text-overlay">
                    <h1>Contact Us</h1>
                    <p>We value your feedback on the quality of our service.
                        <br> To share your thoughts, please use our contact form, and rest assured,
                        <br> we make sure your message reaches the right person and aim to get back to you within 48
                        hours.
                        <br>If for any reason you don't hear from us, don't hesitate to reach out directly via email.
                        <br> You're also welcome to connect with us through the RKMcare all-in-one portal,
                        <br> where you can easily provide feedback and ask any questions you may have.
                        <br>We're here to assist you!
                    </p>

                </div>
            </div>
        </section>


        <section id="section2">
            <div class="card-container">
                <div class="card">
                    <div class="card-header">
                        <!-- Add a card header for the top part -->
                        <h2 class="card-title">Email and Web chat</h2>
                    </div>
                    <div class="card-content">
                        <p>Email</p>
                        <p>
                            <a href="mailto:rkmcare@rkm.co.za">
                                <i class="fas fa-envelope"></i> <!-- FontAwesome email icon -->
                                <span class="email-address">rkmcare@rkm.co.za</span>
                            </a>
                        </p>
                    </div>


                </div>
                <div class="card">
                    <div class="card-header">
                        <!-- Add a card header for the top part -->
                        <h2 class="card-title">Telephone</h2>
                    </div>
                    <div class="card-content">
                        <p>HotLine</p>
                        <p><a href="tel:078 454 7888">
                                <i class="fas fa-phone"></i>
                                <span class="phone-number"> 078 454 7888</span>
                            </a></p>

                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Postal address</h2>
                    </div>
                    <div class="card-content">
                        <p><i class="fas fa-map-marker"></i> <span class="address">Lucas Avenue, Hamilton
                                Building</span></p>
                        <p><i class="fas fa-city"></i> <span class="city">Makhanda, 6139</span></p>
                        <p><i class="fas fa-globe"></i> <span class="country">South Africa</span></p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Physical address</h2>
                    </div>
                    <div class="card-content">
                        <p><i class="fas fa-map-marker"></i> <span class="address">Rhodes University</span></p>
                        <p><i class="fas fa-city"></i> <span class="city">Makhanda, 6140</span></p>
                        <p><i class="fas fa-globe"></i> <span class="country">South Africa</span></p>
                    </div>
                </div>

            </div>
        </section>



        <section id="section3">
            <div class="center">
                <h2 class="message">Send us a message</h2>
                <form name="contactForm" action="process_contactForm.php" onsubmit="return validateForm()"
                    method="post">
                    <label for="name">Full Name:</label>
                    <input type="text" id="name" name="name" placeholder="eg Mavhungu Munzhelele" required><br><br>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="eg stella@gmail.com"><br><br>

                    <label for="message">Message:</label><br>
                    <textarea id="message" name="message" rows="4" cols="50" placeholder="enter your message"
                        required></textarea><br><br>

                    <input type="submit" value="Submit">
                </form>
                <script src="contact.js"></script>
            </div>
        </section>

        <br><br>

        <?php include_once('register.php'); ?>
        <?php require_once('login.php'); ?>


    </div>
    <section id="section3">

        <?php include_once('footer.php'); ?>
    </section>



    <script src=".\js\loading.js"></script>
    <script src=".\js\navigator.js"></script>

    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once("config.php");

    // Connect to the database
    $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE) or die("<p style='color:red'>Could not connect to the database!</p>");

    // Sanitize and validate form inputs
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $message = mysqli_real_escape_string($conn, $_POST['message']);


    // Insert new message record
    $query_insert_message = "INSERT INTO messages(name, email,  message)
     VALUES('$name', '$email', '$message');";

    $result_insert_message = mysqli_query($conn, $query_insert_message);

    // Disconnect from the database
    mysqli_close($conn);
}
?> <script src=".\js\scroll.js"></script>
    <script src=".\js\register.js"></script>

    <script src=".\js\login.js"></script>
</body>

</html>