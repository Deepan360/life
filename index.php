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

// Fetch the last three inserted videos with active = 1
$query = "SELECT id, topic, video_link, description, upload_time, active 
          FROM videos 
          WHERE active = 1 
          ORDER BY id DESC 
          LIMIT 3";

$result = $conn->query($query);

$videos = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $video_id = extractYouTubeID($row['video_link']);
        if ($video_id) {
            $row['video_link'] = $video_id;
        } else {
            $row['video_link'] = '';
        }
        $videos[] = $row;
    }
} else {
    echo "Error fetching videos: " . $conn->error;
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

        .bg-vibe {
            background-color: #198754 !important;
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

        .col-md-4 {
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
            color: rgb(255, 255, 255);
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

        .contact {
            background-color: #ffffff;

            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 50px;
        }

        .contact-form {
            background: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .contact-form .form-label {
            font-weight: bold;
            color: #333;
        }

        .contact-form .form-control {
            border-radius: 5px;
            border: 1px solid #ced4da;
            padding: 10px;
        }

        .contact-form .form-control:focus {
            border-color: #80bdff;
            box-shadow: 0 0 15px 0px rgba(0, 0, 0, 0.5px);
        }

        .contact-form button[type="submit"] {
            background-color: #28a745;
            border: none;
            border-radius: 5px;
            padding: 15px;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .contact-form button[type="submit"]:hover {
            background-color: #218838;
        }

        .contact h2 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
        }

        .contact p {
            font-size: 1rem;
            line-height: 1.5;
            color: #666;
        }

        .contact .col-md-8 {
            max-width: 800px;
            margin: auto;
        }

        .contact .btn {
            width: 100%;
        }

        @media (max-width: 768px) {
            .contact {
                padding: 30px;
            }

            .contact-form {
                padding: 20px;
            }

            .contact h2 {
                font-size: 2rem;
            }

            .contact-form .form-control,
            .contact-form button[type="submit"] {
                font-size: 14px;
                padding: 10px;
            }
        }

        @media (max-width: 576px) {
            .contact {
                padding: 20px;
            }

            .contact-form {
                padding: 15px;
            }

            .contact h2 {
                font-size: 1.75rem;
            }

            .contact-form .form-control,
            .contact-form button[type="submit"] {
                font-size: 12px;
                padding: 8px;
            }
        }

        .map {
            background-color: #ffffff;


            padding: 50px;

        }

        .contact-form {
            border-radius: 10px;
            box-shadow: 0 10px 20px 0px rgba(0, 0, 0, 0.5);
            border: 1px solid #5fd7b4;
        }

        .map-container iframe {
            border-radius: 10px;
            box-shadow: 0 10px 20px 0px rgba(0, 0, 0, 0.5);
        }

        .contact-info p {
            font-size: 1.2rem;
            margin-bottom: 10px;
            color: #333;
        }

        .contact-info a {
            color: #007bff;
            text-decoration: none;
        }

        .contact-info a:hover {
            text-decoration: underline;
        }

        .map h2 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
        }

        @media (max-width: 768px) {
            .map {
                padding: 30px;
            }

            .map h2 {
                font-size: 2rem;
            }

            .contact-info p {
                font-size: 1rem;
            }
        }

        @media (max-width: 576px) {
            .map {
                padding: 20px;
            }

            .map h2 {
                font-size: 1.75rem;
            }

            .contact-info p {
                font-size: 0.9rem;
            }
        }

        .founder {
            background-color: #ffffff;

            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 50px;
        }

        .founder-img {
            width: 100%;
            max-width: 300px;
            border-radius: 50%;
            border: 5px solid #5fd7b4;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .founder-img:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 25px rgba(0, 0, 0, 0.2);
        }

        .founder-name {
            font-size: 2rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        .founder-title {
            font-size: 1.2rem;
            color: #666;
            margin-bottom: 20px;
        }

        .blockquote {
            font-size: 1.1rem;
            font-style: italic;
            color: #555;
            margin-top: 20px;
            border-left: 5px solid #5fd7b4;
            padding-left: 15px;
        }

        .blockquote p {
            margin-bottom: 0;
        }

        .blockquote-footer {
            font-size: 1rem;
            color: #666;
            margin-top: 10px;
        }

        @media (max-width: 768px) {
            .founder {
                padding: 30px;
            }

            .founder-name {
                font-size: 1.5rem;
            }

            .founder-title {
                font-size: 1rem;
            }

            .blockquote {
                font-size: 1rem;
            }
        }

        @media (max-width: 576px) {
            .founder {
                padding: 20px;
            }

            .founder-img {
                max-width: 200px;
            }

            .founder-name {
                font-size: 1.25rem;
            }

            .founder-title {
                font-size: 1rem;
            }

            .blockquote {
                font-size: 0.9rem;
            }
        }

        .faq .card-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .faq .card-header:hover {
            background-color: #e2e6ea;
        }

        .faq .card-header h2 {
            font-size: 1.25rem;
            margin: 0;
        }

        .faq .btn-link {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
            display: block;
            width: 100%;
            text-align: left;
        }

        .faq .btn-link:hover {
            color: #0056b3;
        }

        .faq .card-body {
            font-size: 1rem;
            line-height: 1.5;
        }

        .faq .collapse {
            transition: height 0.3s ease;
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

        #vidmedia .btn-primary {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #vidmedia .btn-primary i {
            margin-left: 0.5rem;
        }
    </style>

</head>

<body>

    <button id="scrollToTopBtn" title="Go to top">
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-arrow-up" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z" />
        </svg>
    </button>
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
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#map">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./media.php">Videos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section with Carousel -->
    <section class="hero">
        <div id="heroCarousel" class="carousel slide hero-carousel" data-bs-ride="carousel" data-bs-interval="2000">
            <div class="carousel-inner">
                <div class="carousel-item active" style="background-image: url('./life-insurance-concept-with-red-heart.jpg');">
                    <div class="hero-content">
                        <h1>Relationship and marriage</h1>
                        <p>Counselling on Marital & Family issue​</p>
                        <a href="#services" class="btn btn-success btn-lg">Explore Services</a>
                    </div>
                </div>
                <div class="carousel-item" style="background-image: url('./market-share-challenge-competitor-excellent-growing.jpg');">
                    <div class="hero-content">
                        <h1>Carrer </h1>
                        <p>Resume, LinkedIn, Career counselling​</p>
                        <a href="#services" class="btn btn-success btn-lg">Explore Services</a>
                    </div>
                </div>
                <div class="carousel-item" style="background-image: url('./working-mother-analyzing-reports-while-using-laptop-home.jpg');">
                    <div class="hero-content">
                        <h1>Real estate and finance</h1>
                        <p>Property selection, Vastu, Inheritance
                        </p>
                        <a href="#services" class="btn btn-success btn-lg">Explore Services</a>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services" data-aos="fade-up">
        <div class="container-fluid p-5">
            <h2 class="text-center mb-5 p-5" data-aos="fade-up">Our Services</h2>
            <div class="row">
                <div class="col" data-aos="fade-up" data-aos-delay="100">
                    <a href="./marriageservice.php" class="card-link">
                        <div class="card">
                            <img src="./istockphoto-1314780540-612x612.jpg" class="card-img-top" alt="Marriage" />
                            <div class="card-body">
                                <p class="card-text">
                                <ul class="card-points text-left">
                                    Insight and clarity on
                                    <li>Pre-marital counselling
                                    </li>
                                    <li>Counselling on family issues & breakups
                                    </li>
                                    <li>Deal with a Toxic relationship
                                    </li>
                                </ul>
                                </p>
                            </div>
                            <div class="card-title-container">
                                <h5 class="card-title">Relationship and marriage</h5>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col" data-aos="fade-up" data-aos-delay="200">
                    <a href="./careerservice.php" class="card-link">
                        <div class="card">
                            <img src="./carrer.jpg" class="card-img-top" alt="career" />
                            <div class="card-body">
                                <p class="card-text">
                                <ul class="card-points text-left">
                                    Insight and clarity on
                                    <li>Branding through LinkedIn
                                    </li>
                                    <li>Corporate growth & Gig economy
                                    </li>
                                    <li>Dealing with stress & a difficult boss
                                    </li>
                                </ul>
                                </p>
                            </div>
                            <div class="card-title-container">
                                <h5 class="card-title">Career</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col" data-aos="fade-up" data-aos-delay="300">
                    <a href="./financeservice.php" class="card-link">
                        <div class="card">
                            <img src="./istockphoto-1311598658-612x612.jpg" class="card-img-top" alt="Finance" />
                            <div class="card-body">
                                <p class="card-text">
                                <ul class="card-points text-left">
                                    Insight and clarity on
                                    <li>Income through Real estate
                                    </li>
                                    <li>Selecting Flat & plot as per Vastu
                                    </li>
                                    <li>Will, Inheritance & Asset restructuring 
                                    </li>
                                </ul>
                                </p>
                            </div>
                            <div class="card-title-container">
                                <h5 class="card-title">Real estate and finance</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- <div class="col" data-aos="fade-up" data-aos-delay="400">
                    <a href="./lifeservice.php" class="card-link">
                        <div class="card">
                            <img src="./depositphotos_75481827-stock-photo-happy-family-jumping-together-on.jpg" class="card-img-top" alt="Life" />
                            <div class="card-body">
                                <p class="card-text">
                                <ul class="card-points  text-left">
                                    Insight and clarity on
                                    <li>Self Happiness</li>
                                    <li>Relationship issues</li>
                                    <li>Life Challenges</li>
                                </ul>
                                </p>
                            </div>
                            <div class="card-title-container">
                                <h5 class="card-title">Life</h5>
                            </div>
                        </div>
                    </a>
                </div> -->
            </div>
        </div>
        <div class="d-flex justify-content-center py-3">
            <button type="button" class="btn btn-primary d-flex justify-content-center" onclick="window.location.href='./services.php'">Go to Services</button>
        </div>
    </section>

    <!-- About Us Section -->
    <section id="about" class="about py-5 bg-vibe">
        <div class="container">
            <h2 class="text-center mb-5 text-white" data-aos="fade-up">About Us</h2>
            <div class="row">
                <div class="col-md-6 d-flex align-items-center" data-aos="fade-right">
                    <img src="./istockphoto-1284448501-612x612.jpg" class="img-fluid shake" alt="About Us" />
                </div>
                <div class="col-md-6" data-aos="fade-left">
                    <h3>Welcome To Anandamana Life</h3>
                    <p class="text-white">
                        We specialize in providing pre marital counselling, family disputes, Real estate, and insight into life for happiness. Our mission is to support and empower individuals and couples to build healthy relationships, achieve financial stability, and lead fulfilling lives. Our team of experienced professionals is dedicated to offering personalized advice and tailored solutions to meet your unique needs.
                    </p>
                    <h3>Our Mission</h3>
                    <p class="text-white">
                        Anandamana Life offers expert advice and support to help you strengthen your relationship through marriage counseling. Our Happiness course and financial wisdom course helps you manage your life effectively and achieve your goals. We make you earn money through real estate and own multiple properties. We believe in a holistic approach to well-being, ensuring that every aspect of your personal and financial life is nurtured and optimized.
                    </p>
                    <h3>Why Choose Us</h3>
                    <p class="text-white">
                        At Anandamana Life, we are committed to your success and well-being. Our counselors and coaches have extensive experience in their respective fields. We offer a safe and confidential environment where you can discuss your concerns and aspirations freely. Our goal is to help you navigate life's challenges with confidence and clarity, empowering you to make informed decisions and take proactive steps towards a brighter future.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section id="testimonials" class="testimonials py-5">
        <div class="container">
            <h2 class="text-center mb-5" data-aos="fade-up">What Our Clients Say</h2>
            <div class="row">
                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
                    <div class="testimonial-item text-center rounded-4 border p-4">
                        <p class="text-muted">"The Counselling services provided here are exceptional. The counselor was very understanding and helped me through a difficult time in my life."</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="testimonial-item text-center rounded-4  border p-4">
                        <p class="text-muted">"I'm extremely grateful for the support I received from the Counselling center. The counselor listened attentively and provided valuable insights."</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="testimonial-item text-center  rounded-4 b-success border p-4">
                        <p class="text-muted">"Highly recommend this Counselling center! The counselor was professional, empathetic, and helped me gain clarity in my life."</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="vidmedia" class="team py-5 bg-light">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-5">
                <h2 class="text-center" data-aos="fade-up">Counselling Videos</h2>
                <a href="media.php" class="btn btn-primary" data-aos="fade-left">View More <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="row justify-content-center">
                <?php if (!empty($videos)) : ?>
                    <?php foreach ($videos as $video) : ?>
                        <div class="col-md-4" data-aos="flip-left" data-aos-delay="80">
                            <div class="team-member text-center">
                                <div class="embed-responsive embed-responsive-16by9 mb-3">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo htmlspecialchars($video['video_link']); ?>" allowfullscreen></iframe>
                                </div>
                                <h5><?php echo htmlspecialchars($video['topic']); ?></h5>
                                <p class="text-muted"><?php echo htmlspecialchars($video['description']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="col-md-12 text-center">
                        <p>No videos found.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section id="map" class="map py-5">
        <div class="container-fluid">
            <!-- Logo Section -->
            <div class="text-center mb-4">
                <img src="logo.png" alt="Company Logo" style="height: 70px;">
                <!-- Replace 'logo.png' with the correct image path -->
            </div>

            <h2 class="text-center">Touch With Us</h2>
            <div class="contact-info text-center">
                <p>
                    <strong>Phone (WhatsApp & Telegram):</strong>
                    <a href="https://wa.me/7305785165" id="phone">7305785165</a>
                </p>
                <p>
                    <strong>Email:</strong>
                    <a href="mailto:anandamanalife@gmail.com" id="email">anandamanalife@gmail.com</a>
                </p>
            </div>

            <!-- Location Section (Optional: Uncomment if needed) -->
            <!--
        <div class="container">
            <h4 class="text-center">Location:</h4>
            <p class="text-center">
                Plot No 19,<br>
                2nd Main Road, Vignesh Nagar, Kattur,<br>
                Tiruchirappalli 620019
            </p>
        </div>
        -->

            <!-- Google Map (Optional: Uncomment if needed) -->
            <!--
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="map-container mb-4" data-aos="zoom-in">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.1345968639007!2d78.74997767573615!3d10.801001758738522!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3baaf36139eb8283%3A0x727d6c12c62d80e4!2s19%2C%202nd%20Main%20St%2C%20Kailash%20Nagar%2C%20Pappakurichi%20Kattur%2C%20Tiruchirappalli%2C%20Tamil%20Nadu%20620019!5e0!3m2!1sen!2sin!4v1718705236315!5m2!1sen!2sin"
                        width="100%" height="550" style="border:3px solid #5fd7b4;" allowfullscreen="" loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>
        -->
        </div>
    </section>


    <!-- <section id="founder" class="founder py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">Meet Our Founder</h2>
            <div class="row justify-content-center align-items-center">
                <div class="col-md-4 text-center" data-aos="fade-right">
                    <img src="./founder.png" alt="Founder Image" class="founder-img mb-4" />
                </div>
                <div class="col-md-6" data-aos="fade-left">
                    <h3 class="founder-name">Anandh</h3>
                    <p class="founder-title">Founder & CEO</p>
                    <blockquote class="blockquote">
                        <p class="mb-0">"The only way to do great work is to love what you do."</p>
                        <footer class="blockquote-footer">Anandh</footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </section> -->

    <section id="faq" class="faq py-2">
        <div class="container">
            <h2 class="text-center mb-5">Frequently Asked Questions</h2>
            <div class="accordion" id="faqAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            What types of counselling services do you offer?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            We offer counselling for family relations, real estate decisions, career guidance, and more. You can book a session via call or WhatsApp.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            How can counselling help me?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Counselling helps bring clarity to your issues and provides a better understanding of the dynamics of a situation, enabling you to navigate life effectively.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Do you accept insurance?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            We do not accept insurance at this time.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            What are your working hours?
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            We are available from **9 a.m. to 9 p.m., Monday to Sunday**. Please contact us to schedule a session that fits your availability.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                <button class="btn btn-outline-success" onclick="window.location.href='./login.php'">Admin</button>
            </div>
        </div>
    </footer>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

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