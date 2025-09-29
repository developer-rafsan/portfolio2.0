<?php include 'template/header.php'; ?>


<!-- Hero Section -->
<section id="hero" class="h-[100vh] flex justify-center items-center relative overflow-hidden snap-section">
    <!-- Marquee / background moving text -->
    <div id="marquee" class="absolute flex whitespace-nowrap select-none">
        <?php 
            $marqueeText = "Build Something Unique";
            echo "<h1 class='text-[50vw] uppercase stroke-text px-10'>{$marqueeText}</h1>";
            echo "<h1 class='text-[50vw] uppercase stroke-text px-10'>{$marqueeText}</h1>";
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
                echo "<span class='skill-text'>{$skill}</span>";
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
        <span class="base"><?= $aboutText ?></span>
        <span class="top"><?= $aboutText ?></span>
    </h3>
</section>



<!-- Projects Section -->
<section id="projects-wrapper"
    class="h-[100vh] w-full flex space-between items-center bg-white overflow-hidden relative">
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



<!-- SECTION -->
<section id="projects-section" class="h-[100vh] flex bg-white relative overflow-hidden">
  <!-- LEFT: Sticky Content -->
  <div id="projects-container" class="w-1/2 h-screen flex flex-col items-start justify-center space-y-6 p-10 text-black bg-blue-500">
    <p class="text-lg font-semibold">OUR WORKS</p>
    <h4 class="text-2xl font-bold leading-relaxed">
      Case Studies, a selection of successful projects.<br>
      We always put our clients first to deliver our best time after time.<br>
      Below is some of our proudest work.
    </h4>
    <a href="#" class="text-blue-600 underline">View All Case Studies</a>
  </div>

  <!-- RIGHT: Images -->
  <div id="projects-image" class="w-1/2 h-full flex flex-col items-center justify-start relative overflow-hidden">
    <div class="h-screen flex items-center justify-center">
      <img src="./assets/image/madical-management-code.png" alt="" class="rounded-lg shadow-md max-h-[80%]">
    </div>
    <div class="h-screen flex items-center justify-center">
      <img src="./assets/image/madical-management-code.png" alt="" class="rounded-lg shadow-md max-h-[80%]">
    </div>
    <div class="h-screen flex items-center justify-center">
      <img src="./assets/image/madical-management-code.png" alt="" class="rounded-lg shadow-md max-h-[80%]">
    </div>
    <div class="h-screen flex items-center justify-center">
      <img src="./assets/image/madical-management-code.png" alt="" class="rounded-lg shadow-md max-h-[80%]">
    </div>
  </div>
</section>




<!-- next -->
 <section class="h-[100vh] flex items-center justify-center bg-white overflow-hidden relative">
  

 </section>



<?php include 'template/footer.php'; ?>