<?php include 'template/header.php'; ?>

<main>
    <!-- Hero Section -->
    <section id="hero" class="h-[90vh] flex justify-center items-center relative overflow-hidden">
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
            Build Something <span>Unique</span>
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
    <section id="projects-wrapper"
        class="h-[100vh] flex items-center relative px-[5vw] gap-x-10 origin-center bg-gradient-to-r from-[#ABFF84] to-[#1FC7D2] overflow-hidden">

        <?php  
      // Array of projects
      $projects = [
        [
          "title" => "Medical Management System",
          "desc"  => "A comprehensive system for managing patient records, appointments, and billing.",
          "images" => [
            "assets/image/madical-management-code.png",
          ],
          "link"  => "#"
        ],
        [
          "title" => "Medical Management System",
          "desc"  => "A comprehensive system for managing patient records, appointments, and billing.",
          "images" => [
            "assets/image/madical-management-code.png",
          ],
          "link"  => "#"
        ],
        [
          "title" => "Medical Management System",
          "desc"  => "A comprehensive system for managing patient records, appointments, and billing.",
          "images" => [
            "assets/image/madical-management-code.png",
          ],
          "link"  => "#"
        ],
        [
          "title" => "Medical Management System",
          "desc"  => "A comprehensive system for managing patient records, appointments, and billing.",
          "images" => [
            "assets/image/madical-management-code.png",
          ],
          "link"  => "#"
        ],
        [
          "title" => "Medical Management System",
          "desc"  => "A comprehensive system for managing patient records, appointments, and billing.",
          "images" => [
            "assets/image/madical-management-code.png",
          ],
          "link"  => "#"
        ],
      ];

      // Loop through projects
      foreach ($projects as $project): 
        ?>
        <!-- Project Card -->
        <div class="w-[80vw] md:w-[35vw] h-[50vh] flex-shrink-0 rounded-lg project-item overflow-hidden relative">
            <!-- Image Slider -->
            <div class="swiper h-full w-full">
                <div class="swiper-wrapper">
                    <?php foreach ($project["images"] as $image): ?>
                    <div class="swiper-slide">
                        <img class="h-full w-full object-cover" src="<?= $image ?>" alt="<?= $project['title'] ?>">
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Overlay -->
            <div class="overlay"></div>

            <!-- Card Content -->
            <div class="project-card-content">
                <h2 class="text-2xl font-bold mb-2"><?= $project["title"] ?></h2>
                <p class="mb-4 text-sm"><?= $project["desc"] ?></p>
                <a href="<?= $project["link"] ?>" class="text-blue-600 font-semibold hover:underline">View Project</a>
            </div>
        </div>
        <?php endforeach; ?>

    </section>



    <!-- next section -->
    <section class="h-[100vh] flex items-center justify-center">
        <h2 class="text-4xl text-white">Next Section</h2>
    </section>



</main>

<?php include 'template/footer.php'; ?>