<?php
$apiKey = "AIzaSyBngsaFVy5XpOoPlRt5x-uyLhzJMEfIyWc";
$playlistId = "PLlNSSJVXsy4V4Z4X4Y9wSZRfBGdspmvsi";
$maxResults = 6;

// YouTube API URL
$url = "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults={$maxResults}&playlistId={$playlistId}&key={$apiKey}";

// Fetch data from YouTube API
$response = file_get_contents($url);
$data = json_decode($response, true);

include 'template/header.php'; 

?>


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
<?php
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
?>

<section id="projects-wrapper" class="h-screen w-full flex items-center bg-white overflow-hidden relative">

    <!-- LEFT: Content -->
    <div class="w-1/2 h-full flex flex-col items-center justify-center p-10">
        <div>
            <h1 class="text-[5vw] text-black mb-6 font-bold">OUR WORKS</h1>
            <p class="text-gray-600 max-w-lg leading-relaxed">
                Case Studies, a selection of successful projects.<br>
                We always put our clients first to deliver our best time after time.<br>
                Below is some of our proudest work.
            </p>
        </div>
    </div>

    <!-- RIGHT: Images -->
    <div id="projects-image"
        class="w-1/2 h-full flex flex-col items-center justify-start relative overflow-hidden space-y-12 py-10 -mr-12">

        <?php foreach($projects as $index => $img): ?>
        <div class="flex items-center justify-center w-full">
            <img src="./assets/image/<?php echo $img; ?>" alt="Project <?php echo $index + 1; ?>"
                class="rounded-xl shadow-lg w-full object-cover">
        </div>
        <?php endforeach; ?>

    </div>
</section>







<!-- youtube videos -->
<section class="h-[100vh] flex items-start justify-center bg-black overflow-hidden relative">
    <!-- Marquee / background moving text -->
    <div id="marquee" class="absolute flex whitespace-nowrap select-none">
        <?php 
            $marqueeText = "Youtube Videos";
            echo "<h1 class='text-[20vw] uppercase stroke-text px-10'>" . htmlspecialchars($marqueeText) . "</h1>";
            echo "<h1 class='text-[20vw] uppercase stroke-text px-10'>" . htmlspecialchars($marqueeText) . "</h1>";
            ?>
    </div>

    <!-- youtube video -->
    <div>
        <?php
    if(isset($data['items'])) {
        foreach($data['items'] as $item) {
            $videoId = $item['snippet']['resourceId']['videoId'];
            $title = $item['snippet']['title'];
            $thumbnail = $item['snippet']['thumbnails']['medium']['url'];
            echo "<div class='video-thumb'>
                    <a href='https://www.youtube.com/watch?v={$videoId}' target='_blank'>
                        <img src='{$thumbnail}' alt='{$title}'>
                    </a>
                    <p>{$title}</p>
                  </div>";
        }
    }
    ?>
    </div>
</section>



<?php include 'template/footer.php'; ?>