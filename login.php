<div id="loginModal" class="modal">
    <div class="modal-content">
        <span class="close doctor-close" id="closeModalBtn">&times;</span>
        <h2 class="login-title">Sign In</h2>
        <form class="login-form" method="post" action="signin.php">
            <label for="email" class="login-label">Email:</label>
            <input type="email" id="email" name="email" required
                pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4]" class="login-input">
            <br>
            <label for="password" class="login-label">Password:</label>
            <input type="password" id="password" name="password" required
                pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$" class="login-input">
            <br>
            <input type="submit" name="submit" value="Sign In" class="login-button">
        </form>
    </div>
</div>