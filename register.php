<div id="registrationModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeModalBtn">&times;</span>
        <h2>Registration Form</h2>
        <form id="registrationForm" method="post" action="signup.php">
            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" required>
            <br>
            <label for="surname">Surname:</label>
            <input type="text" id="surname" name="surname" required>
            <br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}">
            <br>
            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" required pattern="[0-9]{10}">
            <br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$">
            <br>
            <label for="role">Role:</label>
            <select id="role" name="role" required>
                <option value="patient">Patient</option>
                <option value="doctor">Doctor</option>
            </select>
            <br>
            <input type="hidden" name="csrf_token" value="random_token_generated_on_server">

            <div id="extraFieldsContainer"></div>
            <input type="submit" name="submit" value="Register">
        </form>

    </div>
</div>