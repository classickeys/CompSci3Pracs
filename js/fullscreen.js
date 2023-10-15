const slideshowContainer = document.querySelector('.slideshow-container');
const overlay = document.querySelector('.fullscreen-overlay');

// Function to enter fullscreen
function enterFullscreen() {
    if (slideshowContainer.requestFullscreen) {
        slideshowContainer.requestFullscreen();
    } else if (slideshowContainer.mozRequestFullScreen) {
        slideshowContainer.mozRequestFullScreen();
    } else if (slideshowContainer.webkitRequestFullscreen) {
        slideshowContainer.webkitRequestFullscreen();
    } else if (slideshowContainer.msRequestFullscreen) {
        slideshowContainer.msRequestFullscreen();
    }
}

// Function to exit fullscreen
function exitFullscreen() {
    if (document.exitFullscreen) {
        document.exitFullscreen();
    } else if (document.mozCancelFullScreen) {
        document.mozCancelFullScreen();
    } else if (document.webkitExitFullscreen) {
        document.webkitExitFullscreen();
    } else if (document.msExitFullscreen) {
        document.msExitFullscreen();
    }
}

// Function to check if in fullscreen
function isFullscreen() {
    return (
        document.fullscreenElement ||
        document.mozFullScreenElement ||
        document.webkitFullscreenElement ||
        document.msFullscreenElement
    );
}

// Add a click event listener to each image
const images = document.querySelectorAll('.mySlides img');
images.forEach((image, index) => {
    image.addEventListener('click', () => {
        if (isFullscreen()) {
            exitFullscreen();
        } else {
            enterFullscreen();
        }
    });
});
