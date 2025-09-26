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
  y: 500,
  scrollTrigger: {
    trigger: "#hero",
    start: "top top",
    end: "bottom top",
    scrub: true
  }
});

// Optional: slower parallax for marquee background
gsap.to("#marquee", {
  y: 500,
  scrollTrigger: {
    trigger: "#hero",
    start: "top top",
    end: "bottom top",
    scrub: true
  }
});