<?php
echo '
<footer class="footer">

    <div class="footer-left">
        <div class="left-inner">
      
        <a href="about.php" id="about-us" ><h3>About RKMcare</h3></a> 
      <p>RKM Care Tertiary Hospital is committed to providing high-quality healthcare services to our community.</p>
      
      <p class="copyright"><small>&copy; 2023 RKMcare Tertiary Hospital. All rights reserved.</small></p>
        </div>
    </div>

    <div class="footer-center">
        <div class="center-inner">

            <h3>Contact Information</h3>

            <a id="contact-toggle" onclick="toggleContact()" value="">Toggle Contact</a>

            <div id="contact-details" style="display: none;">
                <p>
                <strong>Address:</strong><br>
                Hamilton Building, Lucas Avenue<br>
                Makhanda, 6139<br>
                South Africa
                </p>
                <p>
                <strong>Email:</strong><br>
                <a href="mailto:info@rkmcarehospital.com">info@rkmcarehospital.com</a>
                </p>
                <p>
                <strong>Phone:</strong><br>
                <a href="tel:078 454 788">078 454 788</a>
                </p>
                <p>
                <strong>Working Hours:</strong><br>
                Mon-Fri: 8:00 AM - 4:30 PM<br>
                Sat-Sun: Closed
                </p>
            </div>
        </div>
    </div>

    <div class="footer-right">
        <div class="right-inner">
            <h3>Connect with Us</h3>
            <div class="social-icons">
                <a href="https://www.facebook.com/YourFacebookPage" target="_blank"><img src="images/facebook.png"
                    alt="Facebook"></a>
                <a href="https://www.instagram.com/YourInstagramPage" target="_blank"><img src="images/instagram.png"
                    alt="Instagram"></a>
                <a href="https://twitter.com/YourTwitterPage" target="_blank"><img src="images/Twitter.png" alt="Twitter"></a>
            </div>
            <h3 onclick="toggleNavigator()">Navigator Information <span id="plus-sign">&#43;</span></h3>
            <div id="navigator-details" class="navigator-details" style="display: none;">
                <p><strong>Browser:</strong> <span id="browser-info"></span></p>
                <p><strong>Operating System:</strong> <span id="os-info"></span></p>
                <p><strong>Preferred Language:</strong> <span id="language-info"></span></p>
                <p><strong>Location:</strong> <span id="location-info"></span></p>
                <p><strong>Connection Type:</strong> <span id="connection-info"></span></p>
            </div>
        </div>
    </div>

    
  </footer>
';
?>