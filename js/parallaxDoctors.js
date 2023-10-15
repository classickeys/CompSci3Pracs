const cards = document.querySelectorAll('.card');

cards.forEach((card) => {
  card.addEventListener('mousemove', (e) => {
    const cardRect = card.getBoundingClientRect();
    const cardCenterX = cardRect.left + cardRect.width / 2;
    const cardCenterY = cardRect.top + cardRect.height / 2;
    const mouseX = e.clientX - cardCenterX;
    const mouseY = e.clientY - cardCenterY;

    const parallaxStrength = 80; // Adjust this value to control the parallax effect.

    card.style.backgroundPosition = `calc(50% + ${mouseX / parallaxStrength}px) calc(50% + ${mouseY / parallaxStrength}px)`;
  });

  card.addEventListener('mouseleave', () => {
    card.style.backgroundPosition = 'center';
  });
});