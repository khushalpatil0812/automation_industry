


//its for hero section background image slider with fade effect



// Select the hero background div
const heroBg = document.querySelector('.hero-background');

// Array of background images
const bgImages = [
  'public/industrial-automation-hero1.jpg',
  'public/industrial-automation-hero2.jpg',
  'public/industrial-automation-hero3.jpg'
];

let bgIndex = 0;

// Set initial background
if (heroBg) {
    heroBg.style.backgroundImage = `url(${bgImages[bgIndex]})`;
}

// Change background every 2 seconds with fade effect
setInterval(() => {
    if (!heroBg) return;

    // fade out
    heroBg.style.opacity = 0;

    setTimeout(() => {
        // change image
        bgIndex = (bgIndex + 1) % bgImages.length;
        heroBg.style.backgroundImage = `url(${bgImages[bgIndex]})`;

        // fade in
        heroBg.style.opacity = 1;
    }, 1000); // match CSS transition duration
}, 2000); // every 2 seconds
