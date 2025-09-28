<?php include 'template/header.php'; ?>

<main>
    <!-- Hero Section -->
    <section id="hero" class="h-[90vh] flex justify-center items-center overflow-hidden relative">
        <!-- Marquee / background moving text -->
        <div class="flex whitespace-nowrap absolute overflow-hidden select-none" id="marquee">
            <h1 class="text-[50vw] uppercase stroke-text px-10">Build Something Unique</h1>
            <h1 class="text-[50vw] uppercase stroke-text px-10">Build Something Unique</h1>
        </div>

        <!-- Main heading in foreground -->
        <h1 class="text-[9vw] uppercase text-center font-bold text-white relative z-10 tracking-wide" id="mainHeading">
            Build Something <span>Unique</span>
        </h1>

        <!-- Skill Gallery -->
        <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 flex space-x-10 z-10" id="skillGallery">
            <span class="skill-text">HTML</span>
            <span class="skill-text">CSS</span>
            <span class="skill-text">JavaScript</span>
            <span class="skill-text">React</span>
            <span class="skill-text">Node.js</span>
            <span class="skill-text">PHP</span>
            <span class="skill-text">WordPress</span>
            <span class="skill-text">Git</span>
            <span class="skill-text">GitHub</span>
            <span class="skill-text">NPM</span>
            <span class="skill-text">Sass</span>
            <span class="skill-text">Bootstrap</span>
            <span class="skill-text">Tailwind</span>
            <span class="skill-text">Figma</span>
        </div>
    </section>


    <section class="h-[50vh] p-10 mt-10 about-section">
        <h3 class="reveal-h3">
            <span class="base">
                I'm passionate Full Stack Website Developer with expertise in MERN Stack,
                WordPress Plugin Development, PHP, and MySQL.
                With hands-on experience in Bootstrap, TailwindCSS, Git,
                I build user-friendly, fast, and secure web solutions.
            </span>
            <span class="top">
                I'm passionate Full Stack Website Developer with expertise in MERN Stack,
                WordPress Plugin Development, PHP, and MySQL.
                With hands-on experience in Bootstrap, TailwindCSS, Git,
                I build user-friendly, fast, and secure web solutions.
            </span>
        </h3>
    </section>


    <section id="ptoject-display" class="h-[100vh] flex justify-center items-center overflow-hidden">
    <div id="projects" class="w-full h-full bg-red-500 scale-50"></div>
  </section>

</main>

<?php include 'template/footer.php'; ?>