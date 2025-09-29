<?php include 'template/header.php'; ?>


<!-- Hero Section -->
<section id="hero" class="h-[100vh] flex justify-center items-center relative overflow-hidden snap-section">
    <!-- Marquee / background moving text -->
    <div id="marquee" class="absolute flex whitespace-nowrap select-none">
        <?php 
            $marqueeText = "Build Something Unique";
            echo "<h1 class='text-[50vw] uppercase stroke-text px-10'>" . htmlspecialchars($marqueeText) . "</h1>";
            echo "<h1 class='text-[50vw] uppercase stroke-text px-10'>" . htmlspecialchars($marqueeText) . "</h1>";
            ?>
    </div>

    <!-- Main heading in foreground -->
    <h1 id="mainHeading" class="relative text-center font-bold text-white uppercase tracking-wide">
        lat's Build % Something Unique
    </h1>

    <!-- Skill Gallery -->
    <div id="skills" class="absolute bottom-10 left-1/2 transform -translate-x-1/2 flex space-x-10 flex justify-center">
        <?php
            $skills = ["HTML","CSS","JavaScript","React","Node.js","PHP","WordPress","Git","GitHub","NPM","Sass","Bootstrap","Tailwind","Figma"];
            foreach($skills as $skill) {
                echo "<span class='skill-text'>" . htmlspecialchars($skill) . "</span>";
            }
            ?>
    </div>
</section>



<!-- About Section -->
<section
    class="h-[40vh] mt-10 about-section flex items-end justify-center text-center relative overflow-hidden snap-section">
    <h3 class="reveal-h3">
        <?php 
            $aboutText = "Driven by passion, I craft end-to-end web experiences as a Full Stack Developer.";
            ?>
        <div
            class="assets-rafsan absolute top-[-50px] right-[-50px] w-[80px] h-[80px] object-cover z-10 rounded-full opacity-70">
            <img src="./assets/image/rafsanx.jpg" alt="jahid islam rafsan" class="rounded-full">
        </div>
        <span class="base"><?= htmlspecialchars($aboutText) ?></span>
        <span class="top"><?= htmlspecialchars($aboutText) ?></span>
    </h3>
</section>



<!-- Projects Section -->
<section id="projects-wrapper"
    class="h-[100vh] w-full flex space-between items-center bg-white overflow-hidden relative">
    <div class="w-1/2 h-full flex flex-col items-center justify-center p-10 space-y-20">
        <div>
            <h1 class="text-[5vw] text-black mb-4 text-one">OUR WORKS</h1>
            <p class="text-gray-500 mb-6 max-w-lg">Case Studies, a selection of successful projects.<br>
                We always put our clients first to deliver our best time after time.<br>
                Below is some of our proudest work.
            </p>
        </div>
    </div>

    <!-- RIGHT: Images -->
    <div id="projects-image" class="w-1/2 h-full flex flex-col items-center justify-start relative overflow-hidden space-y-20 py-10">
        <div class="flex items-center justify-center w-full mr-[-50px]">
            <img src="./assets/image/project-medical.jpg" alt="" class="rounded-lg shadow-md w-full max-h-[100%]">
        </div>
        <div class="flex items-center justify-center w-full mr-[-50px]">
            <img src="./assets/image/project-medical.jpg" alt="" class="rounded-lg shadow-md w-full max-h-[100%]">
        </div>
        <div class="flex items-center justify-center w-full mr-[-50px]">
            <img src="./assets/image/project-medical.jpg" alt="" class="rounded-lg shadow-md w-full max-h-[100%]">
        </div>
        <div class="flex items-center justify-center w-full mr-[-50px]">
            <img src="./assets/image/project-medical.jpg" alt="" class="rounded-lg shadow-md w-full max-h-[100%]">
        </div>
        <div class="flex items-center justify-center w-full mr-[-50px]">
            <img src="./assets/image/project-medical.jpg" alt="" class="rounded-lg shadow-md w-full max-h-[100%]">
        </div>
        <div class="flex items-center justify-center w-full mr-[-50px]">
            <img src="./assets/image/project-medical.jpg" alt="" class="rounded-lg shadow-md w-full max-h-[100%]">
        </div>
        <div class="flex items-center justify-center w-full mr-[-50px]">
            <img src="./assets/image/project-medical.jpg" alt="" class="rounded-lg shadow-md w-full max-h-[100%]">
        </div>
        <div class="flex items-center justify-center w-full mr-[-50px]">
            <img src="./assets/image/project-medical.jpg" alt="" class="rounded-lg shadow-md w-full max-h-[100%]">
        </div>
    </div>
</section>






<!-- next -->
<section class="h-[100vh] flex items-center justify-center bg-white overflow-hidden relative">


</section>



<?php include 'template/footer.php'; ?>