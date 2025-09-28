// Register GSAP plugins
gsap.registerPlugin(ScrollTrigger);

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

// Random color generator
function getRandomColor() {
  const colors = ["#ABFF84", "#1FC7D2", "#FF6B6B", "#FFD93D", "#9B5DE5"];
  return colors[Math.floor(Math.random() * colors.length)];
}

// Apply random color by default
const letters = gsap.utils.toArray("#mainHeading .letter");
letters.forEach(el => {
  el.style.color = getRandomColor();
});

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

  // Optional: change color again during animation
  el.style.color = getRandomColor();
}, 500);




// -----------------------------
// Skill text floating animation
// -----------------------------
gsap.utils.toArray("#skillGallery .skill-text").forEach((skill, i) => {
  gsap.to(skill, {
    y: -20,
    repeat: -1,
    yoyo: true,
    duration: 1.5,
    delay: i * 0.2,
    ease: "sine.inOut"
  });
});

// -----------------------------
// About section reveal
// -----------------------------
function splitWords(element, base = false) {
  const words = element.innerText.trim().split(/\s+/);
  element.innerHTML = words.map(w => `<span>${w}&nbsp;</span>`).join('');
  if (base) gsap.set(element.querySelectorAll("span"), { opacity: 0.5 });
}

splitWords(document.querySelector(".reveal-h3 .base"), true);
splitWords(document.querySelector(".reveal-h3 .top"));

gsap.to(".reveal-h3 .top span", {
  opacity: 1,
  y: 0,
  duration: 0.1,
  ease: "power3.out",
  stagger: 1,
  scrollTrigger: {
    trigger: ".about-section",
    start: "top 70%",
    end: "bottom 50%",
    scrub: true
  }
});


// -----------------------------
// Project section scale animation
// -----------------------------
let wrapper = document.querySelector("#projects-wrapper");
let scrollAmount = wrapper.scrollWidth - window.innerWidth;

// Timeline: scale first → then horizontal scroll
let tl = gsap.timeline({
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

// Step 2: fade in and move up as scroll continues
tl.fromTo('#projects-wrapper h1', 
  { opacity: 0, y: 100 }, 
  { opacity: 1, y: 0, ease: "none" }, 
  "<" 
);

// Step 3: fade in and move up as scroll continues
tl.fromTo('#projects-wrapper p', 
  { opacity: 0, y: 100 }, 
  { opacity: 1, y: 0, ease: "none" }, 
  "<" 
);

// Step 3: fade in and move up as scroll continues
tl.fromTo('#projects-wrapper button', 
  { opacity: 0, y: 100 }, 
  { opacity: 1, y: 0, ease: "none" }, 
  "<" 
);


