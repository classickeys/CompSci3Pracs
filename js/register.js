document.addEventListener("DOMContentLoaded", function () {
    const openModalBtn = document.getElementById("openModalBtn");
    const closeModalBtn = document.getElementById("closeModalBtn");
    const registrationModal = document.getElementById("registrationModal");
    const extraFieldsContainer = document.getElementById("extraFieldsContainer");

    openModalBtn.addEventListener("click", function () {
        registrationModal.style.display = "block";
    });

    closeModalBtn.addEventListener("click", function () {
        registrationModal.style.display = "none";
    });

    window.addEventListener("click", function (event) {
        if (event.target === registrationModal) {
            registrationModal.style.display = "none";
        }
    });

    const registrationForm = document.getElementById("registrationForm");


    // Function to show or hide the extra fields based on the selected role
    function showExtraFields() {
        const role = document.getElementById("role").value;
        extraFieldsContainer.innerHTML = ""; // Clear previous fields

        if (role === "patient") {
            // Show gender and address fields for patients
            extraFieldsContainer.innerHTML = `
            <label for="gender">Gender:</label>
            <select id="gender" name="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address">
        `;
        } else if (role === "doctor") {
            // Show specialization field for doctors
            extraFieldsContainer.innerHTML = `
            <label for="specialization">Specialization:</label>
            <input type="text" id="specialization" name="specialization">
        `;
        }
    }

    // Initial call to show extra fields based on the default role
    showExtraFields();

    // Handle role change to dynamically show/hide extra fields
    const roleSelect = document.getElementById("role");
    roleSelect.addEventListener("change", showExtraFields);

    registrationForm.addEventListener("submit", function (event) {
        // Get form field values
        const firstName = document.getElementById("firstName").value;
        const surname = document.getElementById("surname").value;
        const email = document.getElementById("email");
        const phone = document.getElementById("phone");
        const password = document.getElementById("password");
        const role = document.getElementById("role").value;
        const gender = document.getElementById("gender")?.value;
        const address = document.getElementById("address")?.value;
        const specialization = document.getElementById("specialization")?.value;


        // Perform form validation and display error messages
        const isValid = validateForm(
            firstName,
            surname,
            email,
            phone,
            password,
            role
        );

        if (isValid) {
            // Form is valid, you can submit it or take other actions
            alert("Submitting...");
        }

        if (!isValid) {
            event.preventDefault(); // Prevent the default form submission if the form is not valid
        }
    });

    function validateForm(firstName, surname, email, phone, password, role) {
        let isValid = true;

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

        // Check if required fields are not empty
        if (
            !firstName ||
            !surname ||
            !email.value ||
            !phone.value ||
            !password.value ||
            !role
        ) {
            showErrorMessage(firstName, "First name is required");
            showErrorMessage(surname, "Surname is required");
            showErrorMessage(email, "Email is required");
            showErrorMessage(phone, "Phone number is required");
            showErrorMessage(password, "Password is required");
            showErrorMessage(role, "Role is required");
            isValid = false; // Form is not valid
        }

        // Validate email format
        const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        if (!email.value.match(emailPattern)) {
            showErrorMessage(email, "Invalid email format");
            isValid = false;
        }

        // Validate phone number format (10 digits)
        const phonePattern = /^\d{10}$/;
        if (!phone.value.match(phonePattern)) {
            showErrorMessage(phone, "Invalid phone number format");
            isValid = false;
        }

        // Validate password format (at least one digit, one lowercase letter, one uppercase letter, one special character, and a minimum length of 8 characters)
        const passwordPattern =
            /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$/;
        if (!password.value.match(passwordPattern)) {
            showErrorMessage(
                password,
                "Invalid password format, one digit, one lowercase letter, one uppercase letter, one special character, and a minimum length of 8 characters"
            );
            isValid = false;
        }

        return isValid; // All checks passed, form is valid
    }
});
