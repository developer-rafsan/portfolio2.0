<?php
// ===================== YouTube Video Get API =============================
$apiKey      = "AIzaSyBngsaFVy5XpOoPlRt5x-uyLhzJMEfIyWc";
$playlistId  = "PLlNSSJVXsy4V4Z4X4Y9wSZRfBGdspmvsi";
$maxResults  = 6;

// YouTube API URL
$url      = "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults={$maxResults}&playlistId={$playlistId}&key={$apiKey}";
$response = @file_get_contents($url);
$data     = $response ? json_decode($response, true) : [];

// ===================== Portfolio Images =============================
$projects = array_fill(0, 8, "project-medical.jpg");

// ===================== Header Include =============================
include 'template/header.php';
?>

<!-- ===================== Hero Section ============================= -->
<section id="hero" class="h-[100vh] flex justify-center items-end relative overflow-hidden">
    <!-- Marquee / Background Moving Text -->
    <div id="marquee" class="absolute flex whitespace-nowrap select-none 
               [mask-image:linear-gradient(to_bottom,rgba(255,255,255,1),rgba(255,255,255,0.1))]
               [mask-repeat:no-repeat] [mask-size:100%]">
        <?php
            $marqueeText = "Build Something Unique";
            for ($i = 0; $i < 2; $i++) {
                echo "<h1 class='text-[50vw] uppercase stroke-text px-10'>" . htmlspecialchars($marqueeText) . "</h1>";
            }
        ?>
    </div>

    <!-- Main Heading -->
    <h1 id="mainHeading" class="relative w-full text-center font-bold text-white uppercase text-[10vw] leading-none">
        <span>Build Some</span>
        <span>thing Unique</span>
    </h1>
</section>

<!-- ===================== About Intro Section ============================= -->
<section class="h-[60vh] mt-10 flex items-end justify-center text-center relative overflow-hidden text-section">
    <h3 class="reveal-h3 relative">
        <?php $aboutText = "Driven by passion, I craft end-to-end web experiences as a Full Stack Developer."; ?>
        <div
            class="assets-rafsan absolute top-[-50px] right-[-50px] w-[80px] h-[80px] object-cover z-10 rounded-full opacity-70">
            <img src="./assets/image/rafsanx.jpg" alt="Jahid Islam Rafsan" class="rounded-full object-cover">
        </div>
        <span class="base"><?= htmlspecialchars($aboutText) ?></span>
        <span class="top"><?= htmlspecialchars($aboutText) ?></span>
    </h3>
</section>

<!-- ===================== Project Section ============================= -->
<section id="projects-wrapper" class="h-screen w-full flex items-center bg-gray-300 overflow-hidden relative">
    <!-- LEFT: Content -->
    <div class="w-1/2 h-full flex items-center justify-center p-10 text-black">
        <div class='w-2/3'>
            <h1 class="text-[5vw] font-bold mb-6">My Project</h1>
            <p class="text-gray-600 max-w-lg leading-relaxed">
                A collection of my proudest work — blending design, code, and problem-solving.
                These projects showcase not just technical expertise, but also creativity and vision.
                Take a look at how I turn ideas into impactful digital experiences.
            </p>
            <a href="./pages/projects.php" rel="noopener noreferrer">
                <button type="button"
                    class="button bg-blue-500 text-white py-3 px-8 text-md uppercase mt-8 rounded-md transition-all duration-300 hover:bg-blue-600">
                    View More
                </button>
            </a>
        </div>
    </div>

    <!-- RIGHT: Images -->
    <div id="projects-image"
        class="w-1/2 h-full flex flex-col items-center justify-start relative overflow-hidden space-y-12 py-10 -mr-12">
        <?php foreach ($projects as $index => $img): ?>
        <div class="flex items-center justify-center w-full image">
            <img src="./assets/image/<?= htmlspecialchars($img) ?>" alt="Project <?= $index + 1 ?>"
                class="rounded-xl shadow-lg w-full h-[550px] object-cover">
        </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- ===================== About Section ============================= -->
<section id="about-section" class="min-h-screen text-white relative p-10 overflow-hidden">
    <div class="container mx-auto px-6 flex flex-col items-start relative">
        <h1 class="text-[12vw] uppercase font-bold leading-none tracking-tight relative">
            <img src="assets/image/rafsanx.jpg" alt="My Self"
                class="absolute top-[85%] right-[5%] w-1/3 h-[400px] object-cover rounded-xl shadow-lg" />
            <span id="word1" class="inline-block space-x-2">about</span>
            <span id="word2" class="inline-block space-x-2 ml-6">myself</span>
        </h1>
    </div>
    <!-- About Content + Contact -->
    <div class="absolute bottom-[5%] left-0 w-full flex justify-between items-end p-10 gap-10">
        <div class="w-2/5 text-2xl leading-relaxed">
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

        <div class="text-right">
            <h2 class="text-3xl mb-2 font-semibold">Contact:</h2>
            <a href="mailto:developer.rafsanx@gmail.com" class="relative text-white text-3xl no-underline 
                          after:absolute after:left-0 after:bottom-0 after:h-[2px] after:w-0 
                          after:bg-white after:transition-all after:duration-500 hover:after:w-0 after:w-full">
                developer.rafsanx@gmail.com
            </a>
        </div>
    </div>
</section>

<?php include 'template/footer.php'; ?>