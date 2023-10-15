const browserInfo = document.getElementById("browser-info");
const osInfo = document.getElementById("os-info");
const languageInfo = document.getElementById("language-info");
const locationInfo = document.getElementById("location-info");
const connectionInfo = document.getElementById("connection-info");

// Populate footer with Navigator Object Properties
browserInfo.textContent = "Browser: " + navigator.userAgent;
osInfo.textContent = "Operating System: " + navigator.platform;
languageInfo.textContent = "Preferred Language: " + navigator.language;

// Get user's location using geolocation (handle privacy and permissions accordingly)
if ("geolocation" in navigator) {
  navigator.geolocation.getCurrentPosition(
    function (position) {
      const latitude = position.coords.latitude;
      const longitude = position.coords.longitude;
      locationInfo.textContent = `Location: Latitude ${latitude}, Longitude ${longitude}`;
    },
    function (error) {
      locationInfo.textContent =
        "Location: Permission denied or unavailable.";
    }
  );
} else {
  locationInfo.textContent = "Location: Geolocation not supported.";
}

// Check network connection
if (
  "connection" in navigator &&
  "effectiveType" in navigator.connection
) {
  connectionInfo.textContent =
    "Connection Type: " + navigator.connection.effectiveType;
} else {
  connectionInfo.textContent =
    "Connection Type: Information not available.";
}

// JavaScript function to toggle the Navigator Information
function toggleNavigator() {
  const navigatorDetails = document.getElementById("navigator-details");
  const plusSign = document.getElementById("plus-sign");

  if (navigatorDetails.style.display === "block") {
    navigatorDetails.style.display = "none";
    plusSign.textContent = "+";
  } else {
    navigatorDetails.style.display = "block";
    plusSign.textContent = "-";
  }
}

// JavaScript function to toggle the Contact Information
function toggleContact() {
  const contactDetails = document.getElementById("contact-details");
  const contactToggle = document.getElementById("contact-toggle");

  if (contactDetails.style.display === "block") {
    contactDetails.style.display = "none";
    contactToggle.textContent = "Show Contact";
  } else {
    contactDetails.style.display = "block";
    contactToggle.textContent = "Hide Contact";
  }
}