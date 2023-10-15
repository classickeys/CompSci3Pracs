<?php

require_once('check.php'); 

function setFlashMessage($type, $message) {
    $_SESSION['flashMessage'] = [
        'type' => $type,
        'message' => $message
    ];
}

echo '
<header id="myHeader">
    <a href="index.html"> <img src="./images/logo.png" alt="hospital logo" width="100px" height="100px"> </a>
    <h1>RKM Care Tertiary Hospital</h1>
</header>
<nav>
    <div class="navbar">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About RKMcare</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            
            '?>

<?php if (checkUserRole('doctor')) {

    echo '
    <li><a class="medRec" href ="dashboard.php">Dashboard</a></li> 
            
    <li><a class="button sign">Hi, you are logged in</a></li>
    <li><a href="logout.php" class="button sign">Logout</a></li>
    </ul>
</div>
</nav>
            
    ';
} else{
    echo'
    <li class="dropdown login">
                <a  class="dropbtn">Our Doctors <i class="fa fa-caret-down"></i></a>
                <div  class="dropdown-content">
                    <a href="doctors.php">Find a doctor</a>
                    <a id="openLoginModalBtn" class="doctor-action">Sign-in Doctors</a>
                </div>
            </li>
    <li><a id="openModalBtn" class="button medRec login"> Register </a></li>
    <li><a href="appointment.php" class="button medRec login">Request an Appointment</a></li>
    </ul>
</div>
</nav>';
}
?>