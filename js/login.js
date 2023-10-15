document.addEventListener("DOMContentLoaded", function () {


    var doctorActionElements = document.querySelectorAll('.doctor-action');

    // Attach a click event listener to each element
    doctorActionElements.forEach(function(element) {
        element.addEventListener('click', function() {
            // Your common click event logic here
            loginModal.style.display = "block";
            // You can replace the alert with your actual logic
        });
    });


    var closeActionElements = document.querySelectorAll('.doctor-close');

    // Attach a click event listener to each element
    closeActionElements.forEach(function(element) {
        element.addEventListener('click', function() {
            // Your common click event logic here
            loginModal.style.display = "none";
            // You can replace the alert with your actual logic
        });
    });


    const openLoginModalBtn = document.getElementById("openLoginModalBtn");

    const closeLoginModalBtn = document.getElementById("closeModalBtn");
    const loginModal = document.getElementById("loginModal");

    openLoginModalBtn.addEventListener("click", function () {
        
    });

    closeLoginModalBtn.addEventListener("click", function () {
        loginModal.style.display = "none";
    });

    

    window.addEventListener("click", function (event) {
        if (event.target === loginModal) {
            loginModal.style.display = "none";
        }
    });

    const loginForm = document.getElementById("login-form");

    loginForm.addEventListener("submit", function (event) {
        // Get form field values
        const email = document.getElementById("email");
        const password = document.getElementById("password");

        // Perform form validation and display error messages
        const isValid = validateLoginForm(email, password);

        if (!isValid) {
            event.preventDefault(); // Prevent the default form submission if the form is not valid
        }
    });

    function validateLoginForm(email, password) {
        // Function to display an error message next to an input field
        function showErrorMessage(inputField, message) {
            const errorElement = document.createElement("div");
            errorElement.className = "error-message";
            errorElement.textContent = message;
            inputField.parentNode.appendChild(errorElement);
        }

        // Function to clear error messages
        function clearErrorMessages() {
            const errorMessages = document.querySelectorAll(".error-message");
            errorMessages.forEach((error) => error.remove());
        }

        // Clear existing error messages
        clearErrorMessages();

        // Validate email format
        const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        if (!email.value.match(emailPattern)) {
            showErrorMessage(email, "Invalid email format");
            return false;
        }

        // Validate password (add your password validation logic)
        // For example, you can check if it's not empty, has a minimum length, etc.
        if (password.value.length < 8) {
            showErrorMessage(password, "Password must be at least 8 characters");
            return false;
        }

        return true; // Email and password are valid
    }
});
