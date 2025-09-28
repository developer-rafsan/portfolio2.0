<?php include 'template/header.php'; ?>

<main>
    <!-- Hero Section -->
    <section id="hero" class="h-[90vh] flex justify-center items-center relative overflow-hidden">
        <!-- Marquee / background moving text -->
        <div id="marquee" class="absolute flex whitespace-nowrap select-none overflow-hidden">
            <?php 
            // Use a loop to avoid repetition
            $marqueeTexts = ["Build Something Unique", "Build Something Unique"];
            foreach ($marqueeTexts as $text) {
                echo "<h1 class='text-[50vw] uppercase stroke-text px-10'>{$text}</h1>";
            }
            ?>
        </div>

        <!-- Main heading in foreground -->
        <h1 id="mainHeading" class="relative text-[9vw] text-center font-bold text-white uppercase tracking-wide">
            Build Something <span>Unique</span>
        </h1>

        <!-- Skill Gallery -->
        <div id="skillGallery" class="absolute bottom-10 left-1/2 transform -translate-x-1/2 flex space-x-10 flex justify-center">
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
    <section id="project-display" class="h-[100vh] overflow-hidden pointer-events-none">
        <div id="projects-wrapper" class="h-full flex items-center relative px-[5vw] gap-x-10">
            <!-- Mini Box 1 -->
            <div class="w-[80vw] md:w-[40vw] h-[70vh] flex-shrink-0 flex justify-center items-center bg-red-500 rounded-lg">
                <h1 class="text-4xl font-bold">Project 1</h1>
            </div>
            <!-- Mini Box 2 -->
            <div class="w-[80vw] md:w-[40vw] h-[70vh] flex-shrink-0 flex justify-center items-center bg-blue-500 rounded-lg">
                <h1 class="text-4xl font-bold">Project 2</h1>
            </div>
            <!-- Mini Box 3 -->
            <div class="w-[80vw] md:w-[40vw] h-[70vh] flex-shrink-0 flex justify-center items-center bg-green-500 rounded-lg">
                <h1 class="text-4xl font-bold">Project 3</h1>
            </div>
            <!-- Mini Box 4 -->
            <div class="w-[80vw] md:w-[40vw] h-[70vh] flex-shrink-0 flex justify-center items-center bg-yellow-500 rounded-lg">
                <h1 class="text-4xl font-bold">Project 4</h1>
            </div>
            
            <div class="w-[80vw] md:w-[40vw] h-[70vh] flex-shrink-0 flex justify-center items-center bg-yellow-500 rounded-lg">
                <h1 class="text-4xl font-bold">Project 4</h1>
            </div>
        </div>
  </section>
    
    
    <!-- Projects Section -->
    <section class="h-[100vh] flex justify-center items-center overflow-hidden">
        
    </section>
</main>

<?php include 'template/footer.php'; ?>
