// -----------------------------
// Register GSAP Plugins
// -----------------------------
gsap.registerPlugin(ScrollTrigger);


// -----------------------------
// Utility: Split text into spans
// -----------------------------
function splitText(element, type = "letter") {
  if (!element) return []; // safety check
  const text = element.textContent.trim();
  element.innerHTML = text
    .split("")
    .map((char) =>
      char === " " ? "&nbsp;" : `<span class="${type} inline-block">${char}</span>`
    )
    .join("");
  return element.querySelectorAll(`.${type}`);
}

// -----------------------------
// Hero Marquee Animation
// -----------------------------
gsap.to("#marquee", {
  xPercent: -50,
  duration: 200,
  repeat: -1,
  ease: "linear",
});

// -----------------------------
// Hero Text Entry Animation
// -----------------------------
const mainHeading = document.querySelector("#mainHeading");
const heroSpans = mainHeading.querySelectorAll("span");

// Split each line into letter spans
const line1 = splitText(heroSpans[0]);
const line2 = splitText(heroSpans[1]);

const heroTimeline = gsap.timeline({
  scrollTrigger: {
    trigger: "#hero",
    start: "top 80%",
    toggleActions: "play reverse play reverse",
  },
});

heroTimeline
  .fromTo(
    line1,
    { opacity: 0, y: 50 },
    { opacity: 1, y: 0, stagger: 0.1, ease: "power3.out", duration: 1 },
    0
  )
  .fromTo(
    line2,
    { opacity: 0, y: -50 },
    { opacity: 1, y: 0, stagger: 0.1, ease: "power3.out", duration: 1 },
    1
  )

// -----------------------------
// Hero Parallax Effect
// -----------------------------
gsap.to(["#mainHeading", "#marquee"], {
  y: 250,
  ease: "none",
  scrollTrigger: {
    trigger: "#hero",
    start: "top top",
    end: "bottom top",
    scrub: true,
  },
});


// -----------------------------
// Text Section Reveal
// -----------------------------
function splitWords(element) {
  const words = element.innerText.trim().split(/\s+/);
  element.innerHTML = words
    .map((word) => `<span>${word}&nbsp;</span>`)
    .join("");
  return element.querySelectorAll("span");
}

const revealBase = splitWords(document.querySelector(".reveal-h3 .base"));
const revealTop = splitWords(document.querySelector(".reveal-h3 .top"));

gsap
  .timeline({
    scrollTrigger: {
      trigger: ".text-section",
      start: "top 70%",
      end: "bottom 30%",
      scrub: true,
    },
  })
  .to(revealTop, {
    opacity: 1,
    y: 0,
    ease: "power3.out",
    stagger: 0.5,
    duration: 0.1,
  })
  .fromTo(
    "#projects-wrapper",
    { opacity: 0, y: 50 },
    { opacity: 1, y: 0, ease: "power2.out", duration: 1.5 },
    "<0.2"
  );

// -----------------------------
// Project Section Scale & Scroll Animation
// -----------------------------
const wrapper = document.querySelector("#projects-wrapper");
const projectImages = gsap.utils.toArray("#projects-image > div");

gsap
  .timeline({
    scrollTrigger: {
      trigger: wrapper,
      start: "top top",
      end: "+=" + (projectImages.length * 150 + 200) + "%",
      scrub: true,
      pin: true,
      anticipatePin: 1,
      invalidateOnRefresh: true,
    },
  })
  .fromTo(
    wrapper,
    { scale: 0.5 },
    { scale: 1, ease: "power2.inOut", duration: 3 }
  )
  .to(projectImages, {
    yPercent: -100 * (projectImages.length - 1),
    ease: "none",
    duration: projectImages.length * 2,
  })
  .fromTo(
    wrapper,
    { scale: 1 },
    { scale: 0.5, ease: "power3.inOut", duration: 3 }
  );

// -----------------------------
// Custom Cursor
// -----------------------------
const cursor = document.querySelector(".gloval-cursore");
const cursorText = cursor.querySelector(".cursor-text");

document.addEventListener("mousemove", (e) => {
  gsap.to(cursor, {
    duration: 0.05,
    x: e.clientX,
    y: e.clientY,
    ease: "power1.out",
  });
});

document.querySelectorAll(".image, button, .video").forEach((el) => {
  el.addEventListener("mouseenter", () => {
    gsap.to(cursor, {
      scale: 2.5,
      backgroundColor: "#ffffff5e",
      backdropFilter: "blur(10px)",
      duration: 0.3,
    });
    gsap.to(cursorText, { opacity: 1, duration: 0.3 });
    cursorText.innerText = el.classList.contains("image")
      ? "View"
      : el.tagName.toLowerCase() === "button"
        ? "Click"
        : el.classList.contains("video")
          ? "Play"
          : "";
  });
  el.addEventListener("mouseleave", () => {
    gsap.to(cursor, {
      scale: 1,
      backgroundColor: "transparent",
      backdropFilter: "blur(0px)",
      duration: 0.3,
    });
    gsap.to(cursorText, { opacity: 0, duration: 0.3 });
    cursorText.innerText = "";
  });
});

// -----------------------------
// About Section Animation
// -----------------------------
const word1 = document.querySelector("#word1");
const word2 = document.querySelector("#word2");

function splitLetters(word) {
  return word.textContent
    .split("")
    .map((l) => `<span class='letter inline-block'>${l}</span>`)
    .join("");
}

word1.innerHTML = splitLetters(word1);
word2.innerHTML = splitLetters(word2);

const letters1 = word1.querySelectorAll(".letter");
const letters2 = word2.querySelectorAll(".letter");

gsap
  .timeline({
    scrollTrigger: {
      trigger: "#about-section",
      start: "top top",
      pin: true,
      toggleActions: "play reverse play reverse",
    },
  })
  .fromTo(
    letters1,
    { opacity: 0, y: 50 },
    { opacity: 1, y: 0, stagger: 0.1, ease: "power3.out", duration: 1 }
  )
  .fromTo(
    letters2,
    { opacity: 0, y: -50 },
    { opacity: 1, y: 0, stagger: 0.1, ease: "power3.out", duration: 1 },
    0
  )
  .fromTo(
    "#about-section img",
    { opacity: 0, clipPath: "inset(0% 0% 100% 0%)" },
    {
      opacity: 1,
      clipPath: "inset(0% 0% 0% 0%)",
      ease: "power4.out",
      duration: 2,
    },
    "<0.3"
  )
  .fromTo(
    "#about-section h2",
    { opacity: 0 },
    { opacity: 1, ease: "power4.out", duration: 2 },
    "<0.3"
  )
  .fromTo(
    "#about-section p",
    { opacity: 0, clipPath: "inset(0% 0% 100% 0%)" },
    {
      opacity: 1,
      clipPath: "inset(0% 0% 0% 0%)",
      ease: "power4.out",
      duration: 1.8,
    },
    "<0.3"
  );

