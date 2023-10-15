var header = document.getElementById("myHeader");
var headerHeight = header.clientHeight;

function updateHeaderOpacity() {
  var currentScrollPos = window.scrollY;

  // Calculate opacity based on how much the user has scrolled past the header height
  var opacity = 1 - (currentScrollPos / headerHeight);

  // Ensure opacity doesn't go below 0
  opacity = Math.max(0, opacity);

  header.style.opacity = opacity;

  // Toggle header visibility based on opacity
  if (opacity <= 0) {
    header.style.display = "none";
  } else {
    header.style.display = "block";
  }
}

window.addEventListener("scroll", function() {
  requestAnimationFrame(updateHeaderOpacity);
});
