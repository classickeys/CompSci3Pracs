<?php
session_start();
function checkUserRole($allowedRoles) {
    if (isset($_SESSION['role']) && $_SESSION['role'] === $allowedRoles) {
        return true;// User is a doctor, allow access to the page
    } else {
        // User is not a doctor, perform actions like redirecting or showing an error message
        return false;
    }
}


?>