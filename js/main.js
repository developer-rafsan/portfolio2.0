// Register GSAP plugins
gsap.registerPlugin(ScrollTrigger);
gsap.registerPlugin(ScrollToPlugin);

// -----------------------------
// Full-page scroll navigation
// -----------------------------
const sections = document.querySelectorAll(".snap-section");

let currentSection = 0;
let isAnimating = false;

function goToSection(index) {
  if (isAnimating) return;
  if (index < 0 || index >= sections.length) return;

  isAnimating = true;
  currentSection = index;

  gsap.to(window, {
    duration: 0.8,
    scrollTo: { y: sections[index] },
    ease: "power3.inOut",
    onComplete: () => isAnimating = false
  });
}

// Set will-change for animated elements
gsap.set(["#marquee", "#mainHeading", ".letter", ".skill-text", ".project-item"], { willChange: "transform" });

// -----------------------------
// Marquee smooth infinite scroll
// -----------------------------
gsap.to("#marquee", {
  xPercent: -50,
  duration: 200,
  repeat: -1,
  ease: "linear"
});

// -----------------------------
// Parallax effect on scroll
// -----------------------------
gsap.to(["#mainHeading", "#marquee"], {
  y: 50,
  scrollTrigger: {
    trigger: "#hero",
    start: "top top",
    end: "bottom top",
    scrub: true
  }
});

// -----------------------------
// Animate individual letters
// -----------------------------
const heading = document.querySelector("#mainHeading");
heading.innerHTML = heading.textContent
  .split("")
  .map(char => char === ' '
    ? " "
    : char === '%'
      ? "<br>"
      : `<span class="letter inline-block">${char}</span>`)
  .join("");


// Apply random color by default
const letters = gsap.utils.toArray("#mainHeading .letter");


// Define GSAP animations
const animations = [
  el => gsap.fromTo(el, { y: 0 }, { y: -30, duration: 0.6, ease: "power3.out", yoyo: true, repeat: 1 }),
  el => gsap.fromTo(el, { y: 0 }, { y: 40, duration: 0.5, ease: "power3.in", yoyo: true, repeat: 1 }),
  el => gsap.fromTo(el, { rotation: 0 }, { rotation: 360, duration: 1, ease: "elastic.out(1, 0.3)" }),
  el => gsap.fromTo(el, { scale: 1 }, { scale: 1.5, duration: 0.5, yoyo: true, repeat: 1, ease: "back.out(2)" }),
  el => gsap.fromTo(el, { rotation: -10 }, { rotation: 10, duration: 0.2, yoyo: true, repeat: 3 })
];

// Animate random letter at interval (color will still change on animation)
setInterval(() => {
  const el = gsap.utils.random(letters);
  const anim = gsap.utils.random(animations);
  anim(el);
}, 500);


// -----------------------------
// About section reveal
// -----------------------------
function splitWords(element, base = false) {
  const words = element.innerText.trim().split(/\s+/);
  element.innerHTML = words.map(w => `<span>${w}&nbsp;</span>`).join('');
  if (base) gsap.set(element.querySelectorAll("span"), { opacity: 0.5 });
}

// Split words for animation
splitWords(document.querySelector(".reveal-h3 .base"), true);
splitWords(document.querySelector(".reveal-h3 .top"));

// Create a timeline for the section animations
const aboutTimeline = gsap.timeline({
  scrollTrigger: {
    trigger: ".about-section",
    start: "top 70%",
    end: "bottom 30%",
    scrub: true,
  }
});

// Animate the heading words
aboutTimeline.to(".reveal-h3 .top span", {
  opacity: 1,
  y: 0,
  ease: "power3.out",
  stagger: .5,
  duration: .1
});

// Animate the projects wrapper
aboutTimeline.fromTo(
  "#projects-wrapper",
  { opacity: 0, y: 50 },
  {
    opacity: 1,
    y: 0,
    ease: "power3.out",
    stagger: 0.3,
    duration: 1.5
  },
  "<0.2"
);


// -----------------------------
// Project section scale animation
// -----------------------------
const wrapper = document.querySelector("#projects-wrapper");
let sectionx = gsap.utils.toArray("#projects-image > div");

// MAIN TIMELINE
const tl = gsap.timeline({
  scrollTrigger: {
    trigger: wrapper,
    start: "top top",
    end: "+=" + (sectionx.length * 100 + 100) + "%",
    scrub: true,
    pin: true,
    pinSpacing: true,
    anticipatePin: 1,
    invalidateOnRefresh: true
  }
});

// Step 1: scale wrapper
tl.fromTo(wrapper,
  { scale: 0.5 },
  { scale: 1, ease: "power3.out", duration: 2 }
);

// Step 2: vertical slide for images
tl.to(sectionx, {
  yPercent: -100 * (sectionx.length - 1),
  ease: "none",
  duration: sectionx.length
});

// Step 1: scale wrapper
tl.fromTo(wrapper,
  { scale: 1 },
  { scale: 0.5, ease: "power3.out", duration: 2 }
);


// Pin the section
const slider = document.getElementById("video-slider");
const totalScroll = slider.scrollWidth - window.innerWidth;

gsap.to("#video-slider div", {
  x: -totalScroll,
  ease: "none",
  scrollTrigger: {
    trigger: ".videos-section",
    start: "top top",
    end: () => "+=" + totalScroll,
    scrub: true,
    pin: true,
  }
});





// container.addEventListener('mousemove', (e) => {

// });

// container.addEventListener('mouseleave', () => {

// });


const cursor = document.querySelector('.gloval-cursore');
const cursorText = cursor.querySelector('.cursor-text');

// Move cursor with mouse
document.addEventListener('mousemove', (e) => {
    gsap.to(cursor, {
        duration: 0.05,
        x: e.clientX,
        y: e.clientY,
        ease: "power1.out"
    });
});

// Hover effect
document.querySelectorAll('a, button').forEach(el => {
    el.addEventListener('mouseenter', () => {
        gsap.to(cursor, { 
            scale: 2.5, 
            backgroundColor: "#ffffff5e", 
            backdropFilter: "blur(10px)",
            duration: 0.3
        });
        gsap.to(cursorText, { opacity: 1, duration: 0.3 });
    });

    el.addEventListener('mouseleave', () => {
        gsap.to(cursor, { 
            scale: 1, 
            backgroundColor: "transparent",
            backdropFilter: "blur(0px)",
            duration: 0.3
        });
        gsap.to(cursorText, { opacity: 0, duration: 0.3 });
    });
});


