var slideIndex = 0;
showSlides(slideIndex);

var slideshowInterval = setInterval(plusSlides, 2000, 1); // Change slides every 2 seconds

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");

  if (n >= slides.length) {
    slideIndex = 0;
  }

  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
    dots[i].classList.remove("active");
  }

  slides[slideIndex].style.display = "block";
  dots[slideIndex].classList.add("active");
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function plusSlides(n) {
  showSlides(slideIndex += n);
}

var dots = document.getElementsByClassName("dot");
for (var i = 0; i < dots.length; i++) {
  dots[i].addEventListener("click", function () {
    var dotIndex = Array.prototype.indexOf.call(dots, this);
    currentSlide(dotIndex);
  });
}

document.addEventListener("visibilitychange", function() {
  if (document.hidden) {
    clearInterval(slideshowInterval);
  } else {
    slideshowInterval = setInterval(plusSlides, 2000, 1);
  }
});
