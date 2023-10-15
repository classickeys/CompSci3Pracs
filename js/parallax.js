// Select all person containers
const persons = document.querySelectorAll('.person');

// Function to handle the parallax effect
function parallaxEffect() {
  persons.forEach((person, index) => {
    const scrollY = window.scrollY;
    const offsetTop = person.offsetTop;
    const offsetY = (scrollY - offsetTop) * 0.4; // Adjust the factor for parallax intensity
    person.style.transform = `translateY(${offsetY}px)`;
  });
}

// Add a scroll event listener to trigger the parallax effect
window.addEventListener('scroll', parallaxEffect);

// Initial call to apply the effect when the page loads
parallaxEffect();