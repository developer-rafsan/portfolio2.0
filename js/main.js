// Register GSAP plugins
gsap.registerPlugin(ScrollTrigger);

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
// hero text entry animation
// -----------------------------
const mainHeading = document.querySelector("#mainHeading");
const spans = mainHeading.querySelectorAll("span");

// Split each span's text into letter spans
spans.forEach(span => {
  span.innerHTML = span.textContent
    .split("")
    .map(char => char === " " ? " " : `<span class='letter relative inline-block'>${char}</span>`)
    .join("");
});

// Select letters for each line
const line1 = spans[0].querySelectorAll(".letter");
const line2 = spans[1].querySelectorAll(".letter");

// Timeline for scroll-based animation
const tl = gsap.timeline({
  scrollTrigger: {
    trigger: "#hero",
    start: "top 80%",
    toggleActions: "play reverse play reverse",
  },
});

// Animate first line → right to left
tl.fromTo(line1,
  { opacity: 0, y: 50 },
  {
    opacity: 1,
    y: 0,
    stagger: { each: 0.08, from: "end" },
    ease: "power3.out",
    duration: 0.5,
  },
  0
);

// Animate second line → left to right
tl.fromTo(line2,
  { opacity: 0, y: 50 },
  {
    opacity: 1,
    y: 0,
    stagger: { each: 0.08, from: "start" },
    ease: "power3.out",
    duration: 0.5,
  },
  0
);



// -----------------------------
// Parallax effect on scroll
// -----------------------------
gsap.to(["#mainHeading", "#marquee"], {
  y: 250,
  scrollTrigger: {
    trigger: "#hero",
    start: "top top",
    end: "bottom top",
    scrub: true
  }
});



// -----------------------------
// text section reveal
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
const textTimeline = gsap.timeline({
  scrollTrigger: {
    trigger: ".text-section",
    start: "top 70%",
    end: "bottom 30%",
    scrub: true,
  }
});

// Animate the heading words
textTimeline.to(".reveal-h3 .top span", {
  opacity: 1,
  y: 0,
  ease: "power3.out",
  stagger: .5,
  duration: .1
});

// Animate the projects wrapper
textTimeline.fromTo(
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
let sectionx = gsap.utils.toArray("#projects-image > div");

// MAIN TIMELINE
const projectTimeLine = gsap.timeline({
  scrollTrigger: {
    trigger: wrapper,
    start: "top top",
    end: "+=" + (sectionx.length * 150 + 200) + "%",
    scrub: true,
    pin: true,
    pinSpacing: true,
    anticipatePin: 1,
    invalidateOnRefresh: true
  }
});

// Step 1: slow zoom in
projectTimeLine.fromTo(wrapper,
  { scale: 0.5 },
  { scale: 1, ease: "power2.inOut", duration: 3 }
);

// Step 2: vertical slide for images
projectTimeLine.to(sectionx, {
  yPercent: -100 * (sectionx.length - 1),
  ease: "none",
  duration: sectionx.length * 2
});

// Step 3: slow zoom out
projectTimeLine.fromTo(wrapper,
  { scale: 1 },
  { scale: 0.5, ease: "power3.inOut", duration: 3 }
);

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



// Hover + custom cursor text
document.querySelectorAll('.image, button, .video').forEach(el => {
  el.addEventListener('mouseenter', () => {
    gsap.to(cursor, {
      scale: 2.5,
      backgroundColor: "#ffffff5e",
      backdropFilter: "blur(10px)",
      duration: 0.3
    });
    gsap.to(cursorText, { opacity: 1, duration: 0.3 });

    // Change cursor text based on element type
    if (el.classList.contains('image')) {
      cursorText.innerText = "View";
    } else if (el.tagName.toLowerCase() === "button") {
      cursorText.innerText = "Click";
    } else if (el.classList.contains('video')) {
      cursorText.innerText = "Play";
    } else {
      cursorText.innerText = "";
    }
  });

  el.addEventListener('mouseleave', () => {
    gsap.to(cursor, {
      scale: 1,
      backgroundColor: "transparent",
      backdropFilter: "blur(0px)",
      duration: 0.3
    });
    gsap.to(cursorText, { opacity: 0, duration: 0.3 });
    cursorText.innerText = "";
  });
});




// -----------------------------
// About Text Entry Animation
// -----------------------------
const word1 = document.querySelector("#word1");
const word2 = document.querySelector("#word2");

// Split letters into spans
word1.innerHTML = word1.textContent
  .split("")
  .map((l) => `<span class='letter space-x-3 inline-block'>${l}</span>`)
  .join("");

word2.innerHTML = word2.textContent
  .split("")
  .map((l) => `<span class='letter inline-block'>${l}</span>`)
  .join("");

// Collect letters
const letters1 = word1.querySelectorAll(".letter");
const letters2 = word2.querySelectorAll(".letter");

// -----------------------------
// Timeline + ScrollTrigger
// -----------------------------
const aboutTimeline = gsap.timeline({
  scrollTrigger: {
    trigger: "#about-section",
    start: "top 80%",
    toggleActions: "play reverse play reverse", // Play when in view, reverse when out
  },
});

// Word 1 ("about") → right to left
aboutTimeline.fromTo(
  letters1,
  { opacity: 0, y: 50 },
  {
    opacity: 1,
    y: 0,
    stagger: { each: 0.1, from: "end" },
    ease: "power3.out",
    duration: 1,
  },
  0
);

// Word 2 ("myself") → left to right
aboutTimeline.fromTo(
  letters2,
  { opacity: 0, y: -50 },
  {
    opacity: 1,
    y: 0,
    stagger: { each: 0.1, from: "start" },
    ease: "power3.out",
    duration: 1,
  },
  0
);

// Image reveal (top → bottom)
aboutTimeline.fromTo(
  "#about-section img",
  {
    opacity: 0,
    clipPath: "inset(0% 0% 100% 0%)", 
  },
  {
    opacity: 1,
    clipPath: "inset(0% 0% 0% 0%)", 
    ease: "power4.out",
    duration: 2,
  },
  "<0.3"
);

// Contact fade-in
aboutTimeline.fromTo(
  "#about-section h2",
  { opacity: 0 },
  {
    opacity: 1,
    ease: "power4.out",
    duration: 2,
  },
  "<0.3"
);

aboutTimeline.fromTo(
  "#about-section p",
  {
    opacity: 0,
    clipPath: "inset(0% 0% 100% 0%)"
  },
  {
    opacity: 1,
    clipPath: "inset(0% 0% 0% 0%)",
    ease: "power4.out",
    duration: 1.8,
  },
  "<0.5"
);
