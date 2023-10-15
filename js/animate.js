function animateText() {
    const animatedTextElements = document.querySelectorAll(".animated-text");

    // Loop through each element with the "animated-text" class
    animatedTextElements.forEach(function (element) {
      // Set initial opacity to 0 (fully transparent)
      element.style.opacity = 0;

      // Define the animation duration (in milliseconds) and delay (optional)
      const animationDuration = 1000; // 1 second
      const animationDelay = 200; // 0.2 seconds

      // Add the CSS transition property to smoothly animate opacity changes
      element.style.transition = `opacity ${animationDuration}ms ease-in-out ${animationDelay}ms`;

      // Trigger the animation by setting opacity to 1 (fully visible)
      setTimeout(function () {
        element.style.opacity = 1;
      }, animationDelay);
    });
  }

  // Call the animation function when the page loads
  window.onload = animateText;