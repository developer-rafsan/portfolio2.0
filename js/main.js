// Marquee smooth infinite scroll
gsap.to("#marquee", {
  xPercent: -50,
  duration: 200,
  repeat: -1,
  ease: "linear"
});

// Parallax effect for main heading on scroll
gsap.registerPlugin(ScrollTrigger);

gsap.to("#mainHeading", {
  y: 50,
  scrollTrigger: {
    trigger: "#hero",
    start: "top top",
    end: "bottom top",
    scrub: true
  }
});

// Optional: slower parallax for marquee background
gsap.to("#marquee", {
  y: 50,
  scrollTrigger: {
    trigger: "#hero",
    start: "top top",
    end: "bottom top",
    scrub: true
  }
});


// Split heading text into spans
const heading = document.querySelector("#mainHeading");
heading.innerHTML = heading.textContent
  .split("")
  .map(char => char === " " ? " " : `<span class="letter inline-block">${char}</span>`)
  .join("");

// Different animation styles
const animations = [
  // Bounce
  (el) => gsap.fromTo(el, { y: 0 }, { y: -30, duration: 0.6, ease: "bounce.out", yoyo: true, repeat: 1 }),

  // Drop (falls down and back)
  (el) => gsap.fromTo(el, { y: 0 }, { y: 40, duration: 0.5, ease: "power2.in", yoyo: true, repeat: 1 }),

  // Rotate
  (el) => gsap.fromTo(el, { rotation: 0 }, { rotation: 360, duration: 1, ease: "elastic.out(1, 0.3)" }),

  // Scale pop
  (el) => gsap.fromTo(el, { scale: 1 }, { scale: 1.5, duration: 0.3, yoyo: true, repeat: 1, ease: "back.out(2)" }),

  // Wiggle
  (el) => gsap.fromTo(el, { rotation: -10 }, { rotation: 10, duration: 0.1, yoyo: true, repeat: 5 })
];

// Function to animate random letter with random animation
function animateRandomLetter() {
  const letters = document.querySelectorAll("#mainHeading .letter");
  const randomLetter = letters[Math.floor(Math.random() * letters.length)];
  const randomAnimation = animations[Math.floor(Math.random() * animations.length)];

  randomAnimation(randomLetter);
}

// Run every 3 seconds
setInterval(animateRandomLetter, 1000);



// Get all skill texts
const skills = document.querySelectorAll("#skillGallery .skill-text");

// Animate with GSAP
skills.forEach((skill, index) => {
  gsap.to(skill, {
    y: -20,
    repeat: -1,
    yoyo: true,
    duration: 1.5,
    delay: index * 0.2,
    ease: "sine.inOut"
  });
});


gsap.registerPlugin(ScrollTrigger);

// Function: Split text into spans word by word
function splitWords(element, isBase = false) {
  const text = element.innerText.trim();
  const words = text.split(/\s+/);
  element.innerHTML = words.map(w => `<span>${w}&nbsp;</span>`).join('');
  if (isBase) {
    element.querySelectorAll("span").forEach(span => {
      span.style.opacity = "0.5";
    });
  }
}

// Split both base and top
const baseText = document.querySelector(".reveal-h3 .base");
const topText = document.querySelector(".reveal-h3 .top");
splitWords(baseText, true);
splitWords(topText);

// Animate top words with stagger
gsap.to(".reveal-h3 .top span", {
  opacity: 1,
  y: 0,
  duration: 0.1,
  ease: "power3.out",
  stagger: 1,
  scrollTrigger: {
    trigger: ".about-section",
    start: "top 70%",
    end: "bottom 100%",
    scrub: true
  }
});