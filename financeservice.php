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
          WHERE v.active = 1 AND v.categories = 2
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
            <div class="container py-5 text-center">
                <h1 class="display-4 fw-bold">Real Estate & Financial Counselling Services</h1>
                <p class="col-md-8 mx-auto fs-5">
                    Empower your future with expert guidance in real estate and finance. Our counselling services help you make informed property investments, manage your finances wisely, and build long-term financial stability. Whether you're buying your first home or planning your financial future, we're here to support you every step of the way.
                </p>
            </div>
        </div>
    </section>

    <section id="real-estate-counselling" class="py-5 bg-grey text-dark">
        <div class="container">
            <h2 class="section-title text-center mb-5 fw-bold">Comprehensive Real Estate Counselling</h2>
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="row g-4">
                        <div class="col-md-6 ">
                            <ul class="list-group shadow-sm rounded-3 ">
                                <li class="list-group-item border-0"><i class="fas fa-hand-holding-usd text-success me-2"></i> <span style="font-size:1.15rem; font-weight:bold;">Ways to earn money from real estate</span></li>
                                <li class="list-group-item border-0"><i class="fas fa-file-contract text-success me-2"></i> <span style="font-size:1.15rem; font-weight:bold;">Importance of making a will</span></li>
                                <li class="list-group-item border-0"><i class="fas fa-piggy-bank text-success me-2"></i> <span style="font-size:1.15rem; font-weight:bold;">Real estate as an investment class</span></li>
                                <li class="list-group-item border-0"><i class="fas fa-th-large text-success me-2"></i> <span style="font-size:1.15rem; font-weight:bold;">Plot vs flat – detailed comparison</span></li>
                                <li class="list-group-item border-0"><i class="fas fa-map-marked text-success me-2"></i> <span style="font-size:1.15rem; font-weight:bold;">Choosing city and property wisely</span></li>
                                <li class="list-group-item border-0"><i class="fas fa-sliders-h text-success me-2"></i> <span style="font-size:1.15rem; font-weight:bold;">Project comparison – FAR, amenities, etc.</span></li>
                                <li class="list-group-item border-0"><i class="fas fa-warehouse text-success me-2"></i> <span style="font-size:1.15rem; font-weight:bold;">Choosing a flat in multi-storey projects</span></li>
                                <li class="list-group-item border-0"><i class="fas fa-compass text-success me-2"></i> <span style="font-size:1.15rem; font-weight:bold;">Importance of Vaastu</span></li>
                                <li class="list-group-item border-0"><i class="fas fa-search-location text-success me-2"></i> <span style="font-size:1.15rem; font-weight:bold;">Understanding micro-markets</span></li>
                                <li class="list-group-item border-0"><i class="fas fa-clone text-success me-2"></i> <span style="font-size:1.15rem; font-weight:bold;">Acquiring multiple properties</span></li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-group shadow-sm rounded-3">
                                <li class="list-group-item border-0"><i class="fas fa-sync-alt text-success me-2"></i> <span style="font-size:1.15rem; font-weight:bold;">Real estate market cycles</span></li>
                                <li class="list-group-item border-0"><i class="fas fa-balance-scale-right text-success me-2"></i> <span style="font-size:1.15rem; font-weight:bold;">Risk-reward ratio</span></li>
                                <li class="list-group-item border-0"><i class="fas fa-store-alt text-success me-2"></i> <span style="font-size:1.15rem; font-weight:bold;">Commercial/SCO/assured return options</span></li>
                                <li class="list-group-item border-0"><i class="fas fa-user-alt text-success me-2"></i> <span style="font-size:1.15rem; font-weight:bold;">Age-based investment strategies</span></li>
                                <li class="list-group-item border-0"><i class="fas fa-percentage text-success me-2"></i> <span style="font-size:1.15rem; font-weight:bold;">Rental yield importance</span></li>
                                <li class="list-group-item border-0"><i class="fas fa-chart-area text-success me-2"></i> <span style="font-size:1.15rem; font-weight:bold;">REITs – present & future</span></li>
                                <li class="list-group-item border-0"><i class="fas fa-university text-success me-2"></i> <span style="font-size:1.15rem; font-weight:bold;">Home loans and leverage</span></li>
                                <li class="list-group-item border-0"><i class="fas fa-share-square text-success me-2"></i> <span style="font-size:1.15rem; font-weight:bold;">Property inheritance</span></li>
                                <li class="list-group-item border-0"><i class="fas fa-exchange-alt text-success me-2"></i> <span style="font-size:1.15rem; font-weight:bold;">Asset restructuring</span></li>
                                <li class="list-group-item border-0"><i class="fas fa-gavel text-success me-2"></i> <span style="font-size:1.15rem; font-weight:bold;">Impact of government policies</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about py-5 bg-light">
        <div class="container">
            <h2 class="text-center text-dark display-4 fw-bold mb-5">What You Will Understand in the Course</h2>
            <div class="row">
                <div class="col-md-6 d-flex align-items-center" data-aos="fade-right">
                    <img src="./financial-planning.jpg" class="img-fluid shake" alt="About Us" />
                </div>
                <div class="col-md-6">
                    <p class="fs-5">
                        Chanakya often termed wealth as <em>Artha</em>. In the <em>Artha Sutras</em>, he suggests “<em>Artha</em> is the root of happiness.”
                    </p>
                    <div class="row justify-content-center mt-4">
                        <div class="col-md-12">
                            <ul class="list-group">
                                <li class="list-group-item">Selecting Insurances – Life, Health etc.</li>
                                <li class="list-group-item">Growing your hidden money.</li>
                                <li class="list-group-item">Wealth creation – Equity, mutual fund and real estate</li>
                                <li class="list-group-item">Why SGB, Dividends, Rents etc. are important to consider.</li>
                            </ul>
                        </div>
                    </div>
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

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