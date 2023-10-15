<!DOCTYPE html>
<html>



<head>
    <meta charset="utf-8">
    <title>RKMcare</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="./images/logo.png" width="10px" height="10px" type="image/x-icon" />
    <link rel="stylesheet" href=".\css\nav.css">
    <link rel="stylesheet" href=".\css\index.css">
    <link rel="stylesheet" href=".\css\modal.css">
</head>

<body>
    <?php require_once('nav.php'); ?>



    <section id="section1" class="first-section">
        <div class="slideshow-container">
            <div class="mySlides fade">
                <img src="images/doc1.png">
            </div>

            <div class="mySlides fade">
                <img src="images/doc2.png">
            </div>

            <div class="mySlides fade">
                <img src="images/doc3.png">
            </div>

        </div>


        <br>

        <div class="dot-container">
            <span class="dot" onclick="currentSlide(0)"></span>
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
        </div>
    </section>

    <main>

        <section id="section2">
            <h1>Welcome to RKMcare Patient Booking and Data Capture</h1>
        </section>


        <section id="section3">
            <div class="overview">
                <h2>Overview</h2>
                <p>

                    Collaboration between doctors and patients as a cohesive team tends to lead to improved clinical
                    results <br>
                    and
                    a more positive overall patient journey. Although identifying the ideal doctor can be
                    challenging,<br> RKMcare
                    boasts an exceptional group of dedicated physicians to select from,<br> each deeply devoted to your
                    health and
                    welfare.
                </p>
            </div>
        </section>


        <section id="section4">
            <div class="start-container">
                <a href="#" class="card">
                    <h2 class="animated-text">Are you a patient?</h2>
                    <p class="animated-text">Click to make a booking</p>
                </a>

                <a class="card doctor-action">
                    <h2 class="animated-text">Are you a doctor?</h2>
                    <p class="animated-text">Click to check your patients</p>
                </a>

                <a href="about.php" class="card">
                    <h2 class="animated-text">Want to learn more?</h2>
                    <p class="animated-text">Click to learn more about us</p>
                </a>
            </div>
        </section>

        <?php include_once('register.php'); ?>

        <?php require_once('login.php'); ?>

    </main>

    <section id="section5">
        <?php include_once('footer.php'); ?>
    </section>


    

    <script src=".\js\animate.js"></script>
    <script src=".\js\slideshow.js"></script>
    <script src=".\js\scroll.js"></script>
    <script src=".\js\navigator.js"></script>
    <script src=".\js\fullscreen.js"></script>
    <script src=".\js\parallax.js"></script>
    <script src=".\js\loading.js"></script>
    <script src=".\js\register.js"></script>
    <script src=".\js\login.js"></script>


</body>

</html>