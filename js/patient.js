function bookAppointment(doctor, specialty, time) {
    var patientName = prompt("Please enter your full name:");
    if (patientName === null || patientName === "") {
        alert("Please enter a valid patient name.");
        return;
    }

    var patientEmail = prompt("Please enter your email address:");
    if (!isValidEmail(patientEmail)) {
        alert("Please enter a valid email address.");
        return;
    }

    alert("Appointment booked with " + doctor + " (" + specialty + ") at " + time + " for " + patientName + ".");
}

function isValidEmail(email) {
    // Simple email validation using a regular expression
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}