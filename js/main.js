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
    duration: 1,
    scrollTo: { y: sections[index] },
    ease: "power2.inOut",
    onComplete: () => isAnimating = false
  });
}

// Wheel scrolling
window.addEventListener("wheel", (e) => {
  if (e.deltaY > 30) {
    goToSection(currentSection + 1);
  } else if (e.deltaY < -30) {
    goToSection(currentSection - 1);
  }
}, { passive: false });

// Keyboard navigation
window.addEventListener("keydown", (e) => {
  if (e.key === "ArrowDown" || e.key === "PageDown") {
    goToSection(currentSection + 1);
  } else if (e.key === "ArrowUp" || e.key === "PageUp") {
    goToSection(currentSection - 1);
  }
});

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
  el => gsap.fromTo(el, { y: 0 }, { y: -30, duration: 0.6, ease: "power2.out", yoyo: true, repeat: 1 }),
  el => gsap.fromTo(el, { y: 0 }, { y: 40, duration: 0.5, ease: "power2.in", yoyo: true, repeat: 1 }),
  el => gsap.fromTo(el, { rotation: 0 }, { rotation: 360, duration: 1, ease: "elastic.out(1, 0.3)" }),
  el => gsap.fromTo(el, { scale: 1 }, { scale: 1.5, duration: 0.3, yoyo: true, repeat: 1, ease: "back.out(2)" }),
  el => gsap.fromTo(el, { rotation: -10 }, { rotation: 10, duration: 0.1, yoyo: true, repeat: 5 })
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
    toggleActions: "play none none reverse"
  }
});

// Animate the heading words
aboutTimeline.to(".reveal-h3 .top span", {
  opacity: 1,
  y: 0,
  ease: "power3.out",
  stagger: 0.1,
  duration: 0.6
});

// Animate the projects wrapper
aboutTimeline.fromTo(
  "#projects-wrapper",
  { opacity: 0, y: 50 },
  {
    opacity: 1,
    y: 0,
    ease: "power2.out",
    stagger: 0.3,
    duration: 1.5
  },
  "<0.2"
);


// -----------------------------
// Project section scale animation
// -----------------------------
const wrapper = document.querySelector("#projects-wrapper");
const scrollAmount = wrapper.scrollWidth - window.innerWidth;

const tl = gsap.timeline({
  scrollTrigger: {
    trigger: wrapper,
    start: "top top",
    end: () => `+=${3000 + scrollAmount}`,
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
  { scale: 1, ease: "power2.out" }
);

// Animate the projects wrapper children
aboutTimeline.fromTo(
  ['#projects-wrapper h1', '#projects-wrapper p', '#projects-wrapper button'],
  { opacity: 0, y: 100 },
  {
    opacity: 1,
    y: 0,
    ease: "power2.out",
    stagger: 0.3,
    duration: 1.5
  },
  "<0.5"
);



  let container = document.querySelector("#projects-image");
  let sectionx = gsap.utils.toArray("#projects-image > div");

  gsap.to(sectionx, {
    yPercent: -100 * (sectionx.length - 1), // সব images উপরে যাবে একে একে
    ease: "none",
    scrollTrigger: {
      trigger: "#projects-section",
      start: "top top",
      end: "+=" + (sectionx.length * 100) + "%", // scroll length dynamic
      scrub: true,
      pin: true,
      anticipatePin: 1,
    }
  });

