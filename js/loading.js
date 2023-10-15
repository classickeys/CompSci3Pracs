document.addEventListener("DOMContentLoaded", function () {
    const sections = document.querySelectorAll("section");
  
    // Function to check if a section is in the viewport
    function isSectionInViewport(section) {
      const rect = section.getBoundingClientRect();
      return rect.bottom > 0 && rect.top < window.innerHeight;
    }
  
    // Function to show sections as they come into the viewport
    function showSections() {
      sections.forEach((section) => {
        if (isSectionInViewport(section)) {
          section.classList.add("visible");
        }
      });
    }
  
    // Initial load
    showSections();
  
    // Listen for scroll events
    window.addEventListener("scroll", showSections);
  
    // Function to reset animations when scrolling back to the top
    function resetAnimations() {
      if (window.scrollY === 0) {
        sections.forEach((section) => {
          section.classList.remove("visible");
        });
      }
    }
  
    // Listen for scroll events to reset animations
    window.addEventListener("scroll", resetAnimations);
  });
  