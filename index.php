<?php include 'template/header.php'; ?>

<main>
    <!-- Hero Section -->
    <section id="hero" class="h-[100vh] flex justify-center items-center relative overflow-hidden">
        <!-- Marquee / background moving text -->
        <div id="marquee" class="absolute flex whitespace-nowrap select-none">
            <?php 
            $marqueeText = "Build Something Unique";
            echo "<h1 class='text-[50vw] uppercase stroke-text px-10'>{$marqueeText}</h1>";
            echo "<h1 class='text-[50vw] uppercase stroke-text px-10'>{$marqueeText}</h1>";
            ?>
        </div>

        <!-- Main heading in foreground -->
        <h1 id="mainHeading" class="relative text-[9vw] text-center font-bold text-white uppercase tracking-wide">
            lat's Build % Something Unique
        </h1>

        <!-- Skill Gallery -->
        <div id="skillGallery"
            class="absolute bottom-10 left-1/2 transform -translate-x-1/2 flex space-x-10 flex justify-center">
            <?php
            $skills = ["HTML","CSS","JavaScript","React","Node.js","PHP","WordPress","Git","GitHub","NPM","Sass","Bootstrap","Tailwind","Figma"];
            foreach($skills as $skill) {
                echo "<span class='skill-text'>{$skill}</span>";
            }
            ?>
        </div>
    </section>



    <!-- About Section -->
    <section class="h-[50vh] p-10 mt-10 about-section">
        <h3 class="reveal-h3">
            <?php 
            $aboutText = "I'm passionate Full Stack Website Developer with expertise in MERN Stack,
                WordPress Plugin Development, PHP, and MySQL.
                With hands-on experience in Bootstrap, TailwindCSS, Git,
                I build user-friendly, fast, and secure web solutions.";
            ?>
            <span class="base"><?= $aboutText ?></span>
            <span class="top"><?= $aboutText ?></span>
        </h3>
    </section>



    <!-- Projects Section -->
    <section id="projects-wrapper" class="h-[100vh] w-full flex space-between items-center bg-white overflow-hidden relative">

        <div class="w-full h-full flex flex-col items-center justify-center p-10 space-y-20">
            <div>
                <h1 class="text-[5vw] text-black mb-4 text-one">My Projects</h1>
                <p class="text-gray-500 mb-6 max-w-lg">Explore a selection of my recent projects showcasing my skills in
                    full-stack web development, including MERN Stack applications, WordPress plugins, and custom PHP
                    solutions.
                </p>
            </div>
            <button><i class="fa-solid fa-arrow-down"></i></button>
        </div>

        <!-- Projects Container -->
        <div id="projects-container" class=" w-full h-full bg-[#ff005c]"></div>
    </section>



    <!-- next section -->
    <section class="h-[100vh] flex items-center justify-center">
        <div id="projects-container" class=" w-full h-full bg-[#ff005c]"></div>
        <div id="projects-container" class=" w-full h-full bg-white"></div>
    </section>



</main>

<?php include 'template/footer.php'; ?>