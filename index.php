<?php
// ===================== youtube video get API =============================
$apiKey = "AIzaSyBngsaFVy5XpOoPlRt5x-uyLhzJMEfIyWc";
$playlistId = "PLlNSSJVXsy4V4Z4X4Y9wSZRfBGdspmvsi";
$maxResults = 6;

// YouTube API URL
$url = "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults={$maxResults}&playlistId={$playlistId}&key={$apiKey}";

// Fetch data from YouTube API
$response = file_get_contents($url);
$data = json_decode($response, true);


// ===================== portfolio image store =============================
$projects = [
    "project-medical.jpg",
    "project-medical.jpg",
    "project-medical.jpg",
    "project-medical.jpg",
    "project-medical.jpg",
    "project-medical.jpg",
    "project-medical.jpg",
    "project-medical.jpg"
];

// ===================== header include =============================
include 'template/header.php'; 

?>



<!-- ===================== Hero Section ============================= -->
<section id="hero" class="h-[100vh] flex justify-center items-end relative overflow-hidden">
    <!-- Marquee / background moving text -->
    <div id='marquee' class="absolute flex whitespace-nowrap select-none 
                [mask-image:linear-gradient(to_bottom,rgba(255,255,255,1),rgba(255,255,255,0.1))]
                [mask-repeat:no-repeat] [mask-size:100%]">
        <?php
            $marqueeText = "Build Something Unique";
            echo "<h1 class='text-[50vw] uppercase stroke-text px-10'>" . htmlspecialchars($marqueeText) . "</h1>";
            echo "<h1 class='text-[50vw] uppercase stroke-text px-10'>" . htmlspecialchars($marqueeText) . "</h1>";
        ?>
    </div>

    <!-- Main heading in foreground -->
    <h1 id="mainHeading" class="relative w-full text-center font-bold text-white uppercase text-[10vw] leading-none">
        <span>Build Some</span>
        <span>thing Unique</span>
    </h1>
</section>


<!-- ===================== Section ============================= -->
<section class="h-[60vh] mt-10 text-section flex items-end justify-center text-center relative overflow-hidden">
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


<!-- ===================== Project Section ============================= -->
<section id="projects-wrapper" class="h-screen w-full flex items-center bg-gray-300 overflow-hidden relative">
    <!-- LEFT: Content -->
    <div class="w-1/2 h-full flex flex-col items-center justify-center p-10">
        <div>
            <h1 class="text-[5vw] text-black mb-6 font-bold">My Projrct</h1>
            <p class="text-gray-600 max-w-lg leading-relaxed">
                A collection of my proudest work — blending design, code, and problem-solving.
                These projects showcase not just technical expertise, but also creativity and vision.
                Take a look at how I turn ideas into impactful digital experiences.
            </p>
            <a href="./pages/projects.php" rel="noopener noreferrer"><button type="button"
                    class="button text-white bg-blue-500 py-3 px-8 text-md uppercase mt-8 rounded-md">view
                    more</button></a>
        </div>
    </div>

    <!-- RIGHT: Images -->
    <div id="projects-image"
        class="w-1/2 h-full flex flex-col items-center justify-start relative overflow-hidden space-y-12 py-10 -mr-12">

        <?php foreach($projects as $index => $img): ?>
        <div class="flex items-center justify-center w-full image">
            <img src="./assets/image/<?php echo $img; ?>" alt="Project <?php echo $index + 1; ?>"
                class="rounded-xl shadow-lg w-full object-cover">
        </div>
        <?php endforeach; ?>
    </div>
</section>


<!-- ===================== About Section ============================= -->
<section id="about-section" class="min-h-screen text-white relative p-10 overflow-hidden">
    <div class="container mx-auto px-6 flex flex-col items-start">
        <h1 class="text-[12vw] uppercase font-bold leading-none tracking-tight relative">
            <img class="absolute top-[85%] w-1/3 h-[400px] object-cover right-[10%]" src="assets/image/rafsanx.jpg" alt="my self" />
            <span id="word1" class="inline-block space-x-2">about</span>
            <span id="word2" class="inline-block space-x-2 ml-6">myself</span>
        </h1>

        <div class="absolute bottom-[5%] left-[0] w-full flex justify-between items-end p-10">
            <div class="w-2/5 text-2xl">
                <p>
                    I’m <strong>Rafsan X</strong> — a passionate developer dedicated to crafting clean,
                    high-performance, and visually engaging digital experiences. My goal is to blend creativity
                    with technology to deliver innovative solutions that make an impact.
                </p>
                <p class="mt-4">
                    With a strong focus on front-end development, animation, and interactive design,
                    I transform ideas into dynamic web experiences that feel both intuitive and alive.
                </p>
            </div>
            <div>
                <h2 class="text-3xl">Contact:</h2>
                <h2>
                    <a href="mailto:developer.rafsanx@gmail.com"
                        class="relative text-white no-underline after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] after:bg-white after:transition-all after:duration-500 after:w-full hover:after:w-0 text-3xl">
                        developer.rafsanx@gmail.com
                    </a>
                </h2>
            </div>
        </div>
    </div>
</section>



<?php include 'template/footer.php'; ?>