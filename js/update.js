// Function to open the modal
function openModal() {
    document.getElementById('updateInfoModal').style.display = 'block';
}

// Function to close the modal
function closeModal() {
    document.getElementById('updateInfoModal').style.display = 'none';
}

// Validation function for the form fields
function validateForm() {
    // Get form field values
    const name = document.getElementById('name').value;
    const surname = document.getElementById('surname').value;
    const specialization = document.getElementById('specialization').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;

    // Validation logic
    if (!name.trim() || !surname.trim() || !specialization.trim() || !email.trim() || !phone.trim()) {
        alert('Please fill in all fields.');
        return false; // Form is not valid
    }

    // Validate email using a regular expression
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if (!emailPattern.test(email)) {
        alert('Please enter a valid email address.');
        return false; // Form is not valid
    }

    // Validate phone number using a regular expression (adjust pattern as needed)
    const phonePattern = /^\d{10}$/;
    if (!phonePattern.test(phone)) {
        alert('Please enter a valid phone number.');
        return false; // Form is not valid
    }

    return true; // Form is valid
}

// Handle form submission
function submitForm(event) {

    const isValid = validateForm();

    if (!isValid) {
        
    event.preventDefault(); // Prevent the default form submission
    }
}

// Attach a click event to the "Update" button
document.getElementById('updateInfo').addEventListener('click', openModal);

// Attach an event listener to the form's submit event
document.getElementById('updateInfoForm').addEventListener('submit', submitForm);
