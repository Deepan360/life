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
            box-shadow: 0px 0px 25px 10px  rgba(0, 0, 0, 0.9) !important;
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
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        .card {
            display: flex;
            flex-direction: column;
            height: 100%;
        }
        .card-body {
            flex: 1 1 auto;
            text-align: center;
            gap: 20px;
        }
        .col-md-4{
            gap: 5px !important;
        }
        .card-img-top {
            height: 300px;
            object-fit: cover;
        }
        .card {
            position: relative;
            overflow: hidden;
            box-shadow: 0px 15px 25px 0px rgba(0, 0, 0, 0.2);
            gap: 10px !important;
            border-bottom: 3px solid white !important;
        }
        .card-body {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            color: white;
            padding: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transform: translateY(100%);
            transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
        }
        .card-title {
            margin-bottom: var(--bs-card-title-spacer-y);
            color: var(--bs-card-title-color);
            text-align: center;
        }
        .card:hover .card-body {
            transform: translateY(0);
            opacity: 1;
        }
        .card:hover {
            color: #198754 !important;
            border-bottom-color: #198754 !important;
        }
        .card-title-container {
            background: #fff;
            color: #000;
            padding: 10px;
            position: relative;
            z-index: 1;
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
            flex:wrap;
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
        height: 30px; /* Reduce logo size */
    }
    .hero-carousel .carousel-item {
        height: 400px !important; /* Reduce height of carousel */
    }
    .hero-content h1 {
        font-size: 2.5rem; /* Decrease font size of heading */
    }
    .hero-content p {
        font-size: 1.2rem; /* Decrease font size of paragraph */
    }
    .card-img-top {
        height: 200px; /* Reduce height of card images */
    }
    /* Add more adjustments as needed */
}
@media (max-width: 767px) {
.row {
        gap: 10px;
}

    /* Adjustments for smaller screens */
    .footer-content {
        flex-direction: column; /* Stack footer content vertically */
        align-items: center; /* Center items horizontally */
        text-align: center; /* Center text */
    }
    .footer-content button {
        position: static; /* Reset button position */
        margin-top: 10px; /* Add space between button and text */
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
        .footer-content span, .footer-content a {
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
        .mains{
        background-color: #000;
        }
        .small{
            width: 200px !important;
        }
    </style>
       
    </head>

    <body> 

<button id="scrollToTopBtn" title="Go to top">
    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-arrow-up" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
    </svg>
</button>
<nav class="navbar navbar-expand-lg navbar-light fixed-top transparent custom-navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="/logo.png" alt="Anandamana Life Logo">
                Anandamana Life
            </a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav" 
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
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
    </nav>






        <!-- Services Section -->
<section id="services" class="services py-5" data-aos="fade-up">
    <div class="container">
        <h2 class="text-center mb-5" data-aos="fade-up">Our Services</h2>
        <div class="row">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card">
                    <img src="./istockphoto-1314780540-612x612.jpg" class="card-img-top" alt="Marriage" />
                    <div class="card-body">
                        <p class="card-text">
                            We provide comprehensive marriage counseling and support services to help you build a strong and healthy relationship.
                        </p>
                    </div>
                    <div class="card-title-container">
                        <h5 class="card-title">Marriage</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card">
                    <img src="./istockphoto-1311598658-612x612.jpg" class="card-img-top" alt="Finance" />
                    <div class="card-body">
                        <p class="card-text">
                            Our financial planning services are designed to help you manage your money effectively and achieve your financial goals.
                        </p>
                    </div>
                    <div class="card-title-container">
                        <h5 class="card-title">Finance</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card">
                    <img src="./depositphotos_75481827-stock-photo-happy-family-jumping-together-on.jpg" class="card-img-top" alt="Life" />
                    <div class="card-body">
                        <p class="card-text">
                            We offer life coaching and personal development services to help you live a fulfilling and balanced life.
                        </p>
                    </div>
                    <div class="card-title-container">
                        <h5 class="card-title">Life</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</section>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<div class="container">
    
</div>

<footer class="footer mt-5 mb-0">
    <div class="container">
    <h1>Welcome to Our Counseling Center</h1>
    <p>Our mission is to provide quality mental health services to our community.</p>
        <div class="footer-content">
            <span>Stay Connected with Us</span>
            <div class="social-media">
                <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
                <a href="https://www.twitter.com" target="_blank"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
</footer>

<footer class="footer mains mb-0">
    <div class="container">
        <div class="footer-content">
            <span>This web page is developed by Akilam Technology 🌏</span>
        </div>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<!-- AOS Library -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  $('#heroCarousel').carousel({
        interval: 2000
    });

    AOS.init({
        easing: 'ease',
        duration: 400,
        delay: 0,
        disable: 'mobile' 
    });
</script>

        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
 <script>
    const scrollToTopBtn = document.getElementById("scrollToTopBtn");
    const navbar = document.querySelector('.navbar');

    window.onscroll = function() { scrollFunction() };

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
