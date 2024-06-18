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
                        <a class="nav-link" href="./media.php">Videos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section id="services">
        <div class="p-5 mb-4 bg-light text-light">
            <div class="container   py-5 text-center">
                <h1 class="display-4 fw-bold">Professional Counseling Services</h1>
                <p class="col-md-8 mx-auto fs-5">
                    Explore our range of professional counseling services aimed at providing support and guidance for your mental well-being.
                </p>
            </div>
        </div>



        <div class="container py-5">
            <h2 class="fw-bold section-title">Marriage Consultancy Services</h2>
            <div class="row">
                <div class="col">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <div class="col mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-heart me-2 text-pink"></i> Pre-Marital Counseling
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-handshake me-2 text-pink"></i> Conflict Resolution
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-comments me-2 text-pink"></i> Communication Skills
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-heartbeat me-2 text-pink"></i> Marriage Enrichment
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-child me-2 text-pink"></i> Parenting Support
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-heart-broken me-2 text-pink"></i> Infidelity Recovery
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-user-alt-slash text-pink me-2"></i> Separation Advice
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="card bg-pink text-white">
                        <div class="card-body">
                            <h3 class="card-title">Detailed Information</h3>
                            <p class="card-text">
                                Our marriage consultancy services are designed to help you build a strong and lasting relationship. From pre-marital counseling to ongoing relationship advice, we've got you covered.
                            </p>
                            <a href="./marriageservice.php" class="btn btn-outline-light">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container py-5">
            <h2 class="fw-bold section-title">Financial Consultancy Services</h2>
            <div class="row">
                <div class="col">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <div class="col mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-wallet me-2 text-primary"></i> Personal Finance Planning
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-chart-line me-2 text-primary"></i> Investment Strategies
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-piggy-bank me-2 text-primary"></i> Retirement Planning
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-file-invoice-dollar me-2 text-primary"></i> Tax Optimization
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-hand-holding-usd me-2 text-primary"></i> Debt Management
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-scroll me-2 text-primary"></i> Estate Planning
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-shield-alt me-2 text-primary"></i> Insurance Consulting
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-coins me-2 text-primary"></i> Wealth Management
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-calculator me-2 text-primary"></i> Budgeting Advice
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-chart-pie me-2 text-primary"></i> Credit Score Improvement
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-business-time me-2 text-primary"></i> Business Financial Planning
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-save me-2 text-primary"></i> Savings Strategies
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-comments-dollar me-2 text-primary"></i> Loan Consultation
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-exclamation-triangle me-2 text-primary"></i> Risk Management
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-chalkboard-teacher me-2 text-primary"></i> Financial Education
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h3 class="card-title">Detailed Information</h3>
                            <p class="card-text">
                                Achieve your financial goals with our expert advice. Whether it's personal finance, investment strategies, or business financial planning, we provide comprehensive financial consultancy.
                            </p>
                            <a href="./financeservice.php" class="btn btn-outline-light">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Life Coaching Services -->
        <div class="container py-5">
            <h2 class="fw-bold section-title">Life Coaching Services</h2>
            <div class="row">
                <div class="col">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <div class="col mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-bullseye me-2 text-success"></i> Goal Setting
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-briefcase me-2 text-success"></i> Career Coaching
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-user-graduate me-2 text-success"></i> Personal Development
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-brain me-2 text-success"></i> Stress Management
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-clock me-2 text-success"></i> Time Management
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-heartbeat me-2 text-success"></i> Health and Wellness
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-balance-scale me-2 text-success"></i> Work-Life Balance
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-thumbs-up me-2 text-success"></i> Motivational Coaching
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-exchange-alt me-2 text-success"></i> Life Transitions
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-spa me-2 text-success"></i> Mindfulness Coaching
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-user-shield me-2 text-success"></i> Confidence Building
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-handshake me-2 text-success"></i> Relationship Coaching
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-praying-hands me-2 text-success"></i> Spiritual Coaching
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-comments me-2 text-success"></i> Communication Skills
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-user-tie me-2 text-success"></i> Executive Coaching
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <h3 class="card-title">Detailed Information</h3>
                            <p class="card-text">
                                Transform your life with our life coaching services. We offer personalized coaching sessions to help you overcome challenges, set goals, and achieve your dreams.
                            </p>
                            <a href="./lifeservice.php" class="btn btn-outline-light">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Career Consultancy Services -->
        <!-- Career Consultancy Services -->
        <div class="container py-5">
            <h2 class="fw-bold section-title text-center mb-4">Career Consultancy Services</h2>
            <div class="row">
                <div class="col">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <div class="col mb-4">
                            <div class="card  text-info">
                                <div class="card-body">
                                    <i class="fas fa-user-tie me-2"></i> Career Assessment
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="card text-info">
                                <div class="card-body">
                                    <i class="fas fa-briefcase me-2"></i> Job Search Strategies
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="card  text-info">
                                <div class="card-body">
                                    <i class="fas fa-clipboard-list me-2"></i> Resume Building
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="card  text-info">
                                <div class="card-body">
                                    <i class="fas fa-comments me-2"></i> Interview Coaching
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="card  text-info">
                                <div class="card-body">
                                    <i class="fas fa-network-wired me-2"></i> Networking Skills
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="card  text-info">
                                <div class="card-body">
                                    <i class="fas fa-chalkboard-teacher me-2"></i> Professional Development
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="card text-info">
                                <div class="card-body">
                                    <i class="fas fa-chart-line me-2"></i> Career Progression
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="card  text-info">
                                <div class="card-body">
                                    <i class="fas fa-plane-departure me-2"></i> Expatriate Career Advice
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="card  text-info">
                                <div class="card-body">
                                    <i class="fas fa-people-arrows me-2"></i> Work-Life Balance
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="card  text-info">
                                <div class="card-body">
                                    <i class="fas fa-cogs me-2"></i> Skill Development
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="card bg-info text-white">
                        <div class="card-body">
                            <h3 class="card-title">Detailed Information</h3>
                            <p class="card-text">
                                Enhance your career with our consultancy services. From career assessment to interview coaching, we offer comprehensive support to help you achieve your professional goals.
                            </p>
                            <a href="./careerservice.php" class="btn btn-outline-light">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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