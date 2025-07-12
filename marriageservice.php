<?php
session_start();
require 'db.php';

function extractYouTubeID($url)
{
    if (preg_match('/(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $url, $matches)) {
        return $matches[1];
    }
    return false;
}

// Fetch the last inserted video for category = 1 with active = 1
$query = " SELECT v.id, v.topic, v.video_link, v.description, v.upload_time, v.active, c.category
          FROM videos v
          INNER JOIN categories c ON v.categories = c.id
          WHERE v.active = 1 AND v.categories = 1
          ORDER BY v.upload_time DESC
          LIMIT 1";

$result = $conn->query($query);

$video = null;
if ($result) {
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $video_id = extractYouTubeID($row['video_link']);
        if ($video_id) {
            $row['video_link'] = $video_id;
        } else {
            $row['video_link'] = '';
        }
        $video = $row;
    }
} else {
    echo "Error fetching video: " . $conn->error;
}

$conn->close();
?>


<!doctype html>
<html lang="en">

<head>
    <title>Anandamana Life</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- AOS CSS -->
    <!-- <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="shortcut icon" href="./logo.png" type="image/x-icon">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
        @media screen and (max-width: 1200px) {
            .video-card .video-item {
                max-width: 45%;
            }
        }

        @media screen and (max-width: 992px) {
            .video-card .video-item {
                max-width: 48%;
            }
        }

        @media screen and (max-width: 768px) {
            nav {
                padding: 8px !important;
            }

            .video-card .video-item {
                max-width: 100%;
            }
        }

        body {
            font-family: "Roboto", sans-serif;
            line-height: 1.6;
            background-color: #fff;
        }

        .navbar {
            transition: background-color 0.5s, padding 0.5s;
        }

        .navbar.transparent {
            background-color: transparent !important;
        }

        .navbar.scrolled {
            background-color: #198754 !important;
            padding: 5px 0 !important;
            box-shadow: 0px 0px 25px 10px rgba(0, 0, 0, 0.9) !important;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            display: flex;
            align-items: center;
        }

        .navbar-brand img {
            height: 40px;
            margin-right: 10px;
        }

        .hero-carousel .carousel-item {
            height: 900px !important;
            background-size: contain;
            background-position: center;
            position: relative;
        }

        .hero-carousel .carousel-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(0.5px);
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .hero-carousel .carousel-item {
            height: 650px;
            background-size: cover;
            object-fit: contain;
            background-position: center;
        }

        .hero-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
        }

        .hero-carousel .carousel-item {
            height: 650px;
            background-size: cover;
            object-fit: contain;
            background-position: center;
        }

        .hero-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
        }

        .hero-content h1 {
            font-size: 4rem;
            font-weight: bold;
        }

        .hero-content p {
            font-size: 1.5rem;
        }

        footer {
            text-align: center;
            padding: 1rem;
            background-color: #000;
            color: #fff;
        }

        .footer-links {
            display: flex;
            flex-direction: column;
        }

        nav {
            font-family: sans-serif;
            background-color: #7bbb4d !important;
            color: white !important;
            width: 100% !important;
            display: block !important;
        }

        .navbar-brand {
            color: rgb(255 255 255) !important;
        }

        #about .img-fluid {
            border: 3px solid #198754;
            border-radius: 15px !important;
            display: block;
            margin: 0 auto !important;
        }

        #about h3 {
            font-size: 1.5rem;
            font-weight: bold;
            color: #198754;
        }

        .nav-link {
            color: white !important;
            font-size: 16px;
            padding: 10px 15px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            color: black !important;
            text-decoration: underline;
            background-color: rgba(255, 255, 255, 0.2);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            font-size: 14px;
            position: relative;
        }

        .footer-content {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            flex: wrap;
            max-width: 1000px;
            margin: 0 auto;
            padding: 0 20px;
            width: 100%;
        }

        .footer-content span {
            flex: 1;
            text-align: center;
        }

        .footer-content button {
            position: absolute;
            right: 20px;
        }

        .bg-light {
            --bs-bg-opacity: 1;
            background-color: rgb(147 181 165 / 71%) !important;
            color: white;
        }

        #scrollToTopBtn {
            display: none;
            position: fixed;
            bottom: 60px;
            right: 20px;
            z-index: 99;
            border: none;
            outline: none;
            background-color: #198754;
            color: white;
            cursor: pointer;
            padding: 0px 5px;
            border-radius: 50%;
            font-size: 24px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        #scrollToTopBtn:hover {
            background-color: #145c32;
        }

        #scrollToTopBtn svg {
            width: 24px;
            height: 14px;
            fill: currentColor;
        }

        @media (max-width: 767px) {

            /* Adjustments for smaller screens */
            .navbar-brand img {
                height: 30px;
                /* Reduce logo size */
            }

            .hero-carousel .carousel-item {
                height: 400px !important;
                /* Reduce height of carousel */
            }

            .hero-content h1 {
                font-size: 2.5rem;
                /* Decrease font size of heading */
            }

            .hero-content p {
                font-size: 1.2rem;
                /* Decrease font size of paragraph */
            }

            .card-img-top {
                height: 200px;
                /* Reduce height of card images */
            }

            /* Add more adjustments as needed */
        }

        @media (max-width: 767px) {
            .row {
                gap: 10px;
            }

            /* Adjustments for smaller screens */
            .footer-content {
                flex-direction: column;
                /* Stack footer content vertically */
                align-items: center;
                /* Center items horizontally */
                text-align: center;
                /* Center text */
            }

            .footer-content button {
                position: static;
                /* Reset button position */
                margin-top: 10px;
                /* Add space between button and text */
            }

            /* Add more adjustments as needed */
        }

        .footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .footer-content span,
        .footer-content a {
            color: white;
        }

        .footer-content .social-media {
            display: flex;
            gap: 15px;
        }

        .footer-content .social-media a {
            color: white;
            font-size: 1.5rem;
            transition: color 0.3s;
        }

        .footer-content .social-media a:hover {
            color: #17a2b8;
        }

        .footer .btn-outline-success {
            margin-left: auto;
        }

        .mains {
            background-color: #000;
        }

        .small {
            width: 200px !important;
        }

        .jumbotron-custom {
            background-image: url('your-image-url.jpg');
            /* Add your background image URL */
            background-size: cover;
            background-position: center;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            position: relative;
            overflow: hidden;
        }

        .jumbotron-custom::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            /* Add a dark overlay */
            z-index: 1;
        }

        .jumbotron-content {
            position: relative;
            z-index: 2;
        }

        .list-group-item {
            display: flex;
            align-items: center;
            padding: 15px;
            border: none;
            border-bottom: 1px solid #ddd;
            transition: background-color 0.3s ease;
        }

        .list-group-item i {
            margin-right: 10px;
            color: #007bff;
        }

        .list-group-item:hover {
            background-color: #f8f9fa;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            font-size: 1.5rem;
        }

        .btn-outline-light {
            border: 1px solid white;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .btn-outline-light:hover {
            background-color: white;
            color: #007bff;
        }

        .section-title {
            font-size: 2rem;
            margin-bottom: 2rem;
            text-align: center;
            color: #343a40;
        }

        .text-pink {
            color: #ff8096;
        }

        .bg-pink {
            background-color: #ff8096;
        }

        .video-item {
            max-width: 900px;
            /* Adjust width as needed */
            margin: 0 auto;
            /* Center the video */
        }

        .video-container {
            position: relative;
            width: 100%;
            padding-bottom: 56.25%;

        }

        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .video-item {
            max-width: 900px;
            /* Adjust width as needed */
            margin: 0 auto;
            /* Center the video */
        }

        .video-container {
            position: relative;
            width: 100%;
            padding-bottom: 56.25%;
            /* 16:9 aspect ratio (height:width) */
        }

        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top transparent custom-navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="/logo.png" alt="Anandamana Life Logo">
                Anandamana Life
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./services.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./media.php">Videos</a>
                    </li>
                </ul>
            </div>
        </div>
        <button id="scrollToTopBtn" title="Go to top">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-arrow-up" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z" />
            </svg>
        </button>
    </nav>
    <section id="services">
        <div class="p-5 mb-4 bg-light bg-gradient text-dark">
            <div class="container   py-5 text-center">
                <h1 class="display-4 fw-bold">Marriage Counselling Services</h1>
                <p class="col-md-8 mx-auto fs-5">
                    "Marriage is not just a union of two souls, but a journey together, hand in hand, through every moment, whether it's joyous or challenging."
                </p>
            </div>
        </div>
    </section>
    <section id="marriage-relationships" class="py-5 bg-white text-dark">
        <div class="container">
            <h2 class="section-title text-center mb-5 fw-bold">Marriage & Relationship Counselling</h2>
            <div class="row g-4">
                <div class="col-md-6 shadow-md-6">
                    <ul class="list-group shadow-sm rounded-3">
                        <li class="list-group-item border-0">
                            <i class="fas fa-user-check text-success me-2" ></i>
                            <span style="font-size:1.15rem; font-weight:bold;">
                                Pre-marital counselling. How to spot a red flag in a man and a woman before marriage?​
                            </span>
                        </li>
                        <li class="list-group-item border-0">
                            <i class="fas fa-heart-broken text-success me-2" ></i>
                            <span style="font-size:1.15rem; font-weight:bold;">
                                Counselling on marital differences and understanding what kills a marriage.​
                            </span>
                        </li>
                        <li class="list-group-item border-0">
                            <i class="fas fa-users text-success me-2" ></i>
                            <span style="font-size:1.15rem; font-weight:bold;">
                                Relationship with parents and siblings
                            </span>
                        </li>
                        <li class="list-group-item border-0">
                            <i class="fas fa-hand-holding-heart text-success me-2" ></i>
                            <span style="font-size:1.15rem; font-weight:bold;">
                                How to deal with breakups?
                            </span>
                        </li>
                        <li class="list-group-item border-0">
                            <i class="fas fa-rupee-sign text-success me-2" ></i>
                            <span style="font-size:1.15rem; font-weight:bold;">
                                Money and relationships
                            </span>
                        </li>
                        <li class="list-group-item border-0">
                            <i class="fas fa-skull-crossbones text-success me-2" ></i>
                            <span style="font-size:1.15rem; font-weight:bold;">
                                How to deal with a Toxic relationship?
                            </span>
                        </li>
                        <li class="list-group-item border-0">
                            <i class="fas fa-user-secret text-success me-2" ></i>
                            <span style="font-size:1.15rem; font-weight:bold;">
                                How to identify narcissistic behavior in the family?​
                            </span>
                        </li>
                        <li class="list-group-item border-0">
                            <i class="fas fa-brain text-success me-2" ></i>
                            <span style="font-size:1.15rem; font-weight:bold;">
                                How to deal with gaslighting and narcissism?
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 shadow-md-6">
                    <ul class="list-group shadow-sm rounded-3">
                        <li class="list-group-item border-0">
                            <i class="fas fa-map-signs text-success me-2"></i>
                            <span style="font-size:1.15rem; font-weight:bold;">
                                How to choose the right job, place, and spouse for a happy life.
                            </span>
                        </li>
                        <li class="list-group-item border-0">
                            <i class="fas fa-sliders-h text-success me-2" style="font-size:1.15rem;"></i>
                            <span style="font-size:1.15rem; font-weight:bold;">
                                How variables affect our lives and how to get control of our lives.​
                            </span>
                        </li>
                        <li class="list-group-item border-0">
                            <i class="fas fa-lightbulb text-success me-2" style="font-size:1.15rem;"></i>
                            <span style="font-size:1.15rem; font-weight:bold;">
                                What is the Purpose of life– 25 Practical tips for Happy living​
                            </span>
                        </li>
                        <li class="list-group-item border-0">
                            <i class="fas fa-smile-beam text-success me-2" style="font-size:1.15rem;"></i>
                            <span style="font-size:1.15rem; font-weight:bold;">
                                How Money can give you happiness
                            </span>
                        </li>
                        <li class="list-group-item border-0">
                            <i class="fas fa-wallet text-success me-2" style="font-size:1.15rem;"></i>
                            <span style="font-size:1.15rem; font-weight:bold;">
                                Financial wisdom- Money mindset for happiness in relation​
                            </span>
                        </li>
                        <li class="list-group-item border-0">
                            <i class="fas fa-palette text-success me-2" style="font-size:1.15rem;"></i>
                            <span style="font-size:1.15rem; font-weight:bold;">
                                Art of creative passive income
                            </span>
                        </li>
                        <li class="list-group-item border-0">
                            <i class="fas fa-gem text-success me-2" style="font-size:1.15rem;"></i>
                            <span style="font-size:1.15rem; font-weight:bold;">
                                Understanding the difference between Rich vs wealthy​
                            </span>
                        </li>
                        <li class="list-group-item border-0">
                            <i class="fas fa-hourglass-half text-success me-2" style="font-size:1.15rem;"></i>
                            <span style="font-size:1.15rem; font-weight:bold;">
                                Understanding time and how to buy time in life​
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- About Us Section -->
    <section class="about py-5  bg-light">
        <div class="container">
            <h2 class="text-center text-dark display-4 fw-bold mb-5" data-aos="fade-up">Pre Marital counselling</h2>
            <div class="row">
                <div class="col-md-6 d-flex align-items-center" data-aos="fade-right">
                    <img src="./mr.jpg" class="img-fluid shake" alt="About Us" />
                </div>
                <div class="col-md-6 " data-aos="fade-left">

                    <h5 class="text-success"> What is the importance of pre-marital counselling?</h5>
                    <p>
                        Marriage is becoming more fragile in these times than earlier. To understand each other, a comprehensive counselling session is organized which provides transparency and insight to avoid an unfortunate surprise for both families before the marriage.
                    </p>
                    <h5 class="text-success"> Why is it needed?</h5>
                    <p>To have a clear understanding and an everlasting relation, counselling is needed. Any friction in a newlywed couple affects both families emotionally, financially, and socially for a long time.</p>
                    <h5 class="text-success"> What is included in the session and how is it done?</h5>
                    <p> To make an informed choice, one counselling session with a holistic approach is organized together with both families. This counselling session will definitely help the families to make an informed choice. The bride and groom understand the compatibility as almost all major life possible issues and concerns are covered before the marriage.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container-fluid mt-4">
            <div class="video-card align-items-center text-dark">
                <?php if ($video !== null) : ?>
                    <div class="video-item text-center" id="video-<?php echo htmlspecialchars($video['id']); ?>">
                        <div class="video-container">
                            <iframe src="https://www.youtube.com/embed/<?php echo htmlspecialchars($video['video_link']); ?>" allowfullscreen></iframe>
                        </div>
                        <h4 class=" mb-2"><?php echo htmlspecialchars($video['topic']); ?></h4>
                        <p class="mb-2"><?php echo htmlspecialchars($video['description']); ?></p>
                        <!-- <div>
                            <a href="https://www.youtube.com/watch?v=<?php echo htmlspecialchars($video['video_link']); ?>" class="btn btn-outline-success" target="_blank">Watch Video</a>
                        </div> -->
                    </div>
                <?php else : ?>
                    <p>No video found.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <footer class="footer mt-5 bg-dark text-light py-4">
        <div class="container text-center">
            <h3 class="mb-3">Welcome to Our Counselling Center</h3>
            <p class="mb-4">Our mission is to provide quality mental health services to our community.</p>
            <div class="footer-content d-flex flex-column align-items-center">
                <span class="mb-2">Stay Connected with Us</span>
                <div class="social-media d-flex gap-4">
                    <a href="https://www.facebook.com" target="_blank" class="text-light fs-4" aria-label="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://twitter.com" target="_blank" class="text-light fs-4" aria-label="X (formerly Twitter)">
                        <i class="fab fa-x-twitter"></i>
                    </a>

                    <a href="https://www.instagram.com" target="_blank" class="text-light fs-4" aria-label="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <footer class="footer mains">
        <div class="container">
            <div class="footer-content">
                <span>This web page is developed by Akilam Technology 🌏</span>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script>
        const scrollToTopBtn = document.getElementById("scrollToTopBtn");
        const navbar = document.querySelector('.navbar');

        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                scrollToTopBtn.style.display = "block";
                navbar.classList.add('scrolled');
                navbar.classList.remove('transparent');
            } else {
                scrollToTopBtn.style.display = "none";
                navbar.classList.remove('scrolled');
                navbar.classList.add('transparent');
            }
        }

        scrollToTopBtn.onclick = function() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
        var myCarousel = new bootstrap.Carousel(document.getElementById('heroCarousel'), {
            interval: 5000, // Adjust interval as needed
            pause: 'hover'
        });
    </script>

</body>

</html>