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
.contact-form{
    border-radius: 10px;
    box-shadow: 0 10px 20px 0px rgba(0, 0, 0, 0.5);
    border:1px solid #5fd7b4;
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
                    <h1>Welcome to Anandamana Life</h1>
                    <p>Your health and wellness, our priority</p>
                    <a href="#services" class="btn btn-success btn-lg">Explore Services</a>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url('./market-share-challenge-competitor-excellent-growing.jpg');">
                <div class="hero-content">
                    <h1>Comprehensive Health Solutions</h1>
                    <p>Empowering you to live a healthier life</p>
                    <a href="#services" class="btn btn-success btn-lg">Explore Services</a>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url('./working-mother-analyzing-reports-while-using-laptop-home.jpg');">
                <div class="hero-content">
                    <h1>Expert Consultation</h1>
                    <p>Professional advice and support</p>
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
<section id="services" class="services py-5" data-aos="fade-up">
    <div class="container-fluid p-5">
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
  <div class="d-flex justify-content-center py-3">
  <button type="button" class="btn btn-primary d-flex justify-content-center" onclick="window.location.href='./services.php'">Go to Services</button>
    </div>
</section>

<!-- About Us Section -->
<section id="about" class="about py-5 bg-light" >
    <div class="container">
        <h2 class="text-center mb-5" data-aos="fade-up">About Us</h2>
        <div class="row">
            <div class="col-md-6 d-flex align-items-center" data-aos="fade-right">
                <img src="./istockphoto-1284448501-612x612.jpg" class="img-fluid shake" alt="About Us" />
            </div>
            <div class="col-md-6" data-aos="fade-left">
                <h3>Welcome To Anandamana Life</h3>
                <p>
                    We specialize in providing comprehensive services for marriage counseling, financial planning, and life coaching. Our mission is to support and empower individuals and couples to build healthy relationships, achieve financial stability, and lead fulfilling lives. Our team of experienced professionals is dedicated to offering personalized advice and tailored solutions to meet your unique needs.
                </p>
                <h3>Our Mission</h3>
                <p>
                    Anandamana Life offers expert advice and support to help you strengthen your relationship through marriage counseling. Our financial planning services help you manage your finances effectively and achieve your goals. Additionally, we provide life coaching to guide you in living a balanced and fulfilling life. We believe in a holistic approach to well-being, ensuring that every aspect of your personal and financial life is nurtured and optimized.
                </p>
                <h3>Why Choose Us</h3>
                <p>
                    At Anandamana Life, we are committed to your success and well-being. Our counselors and coaches are certified professionals with extensive experience in their respective fields. We offer a safe and confidential environment where you can discuss your concerns and aspirations freely. Our goal is to help you navigate life's challenges with confidence and clarity, empowering you to make informed decisions and take proactive steps towards a brighter future.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section id="testimonials" class="testimonials py-5" >
    <div class="container">
        <h2 class="text-center mb-5" data-aos="fade-up">What Our Clients Say</h2>
        <div class="row">
            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
                <div class="testimonial-item text-center">
                    <img src="./836.jpg" class="img-fluid rounded-circle mb-3" alt="Client 1" />
                    <h5>Client One</h5>
                    <p class="text-muted">"Lorem ipsum dolor sit amet, consectetur adipiscing elit."</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
                <div class="testimonial-item text-center">
                    <img src="./836.jpg" class="img-fluid rounded-circle mb-3" alt="Client 2" />
                    <h5>Client Two</h5>
                    <p class="text-muted">"Lorem ipsum dolor sit amet, consectetur adipiscing elit."</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="300">
                <div class="testimonial-item text-center">
                    <img src="./836.jpg" class="img-fluid rounded-circle mb-3" alt="Client 3" />
                    <h5>Client Three</h5>
                    <p class="text-muted">"Lorem ipsum dolor sit amet, consectetur adipiscing elit."</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Team Section -->
<section id="team" class="team py-5 bg-light" >
    <div class="container">
        <h2 class="text-center mb-5" data-aos="fade-up">Meet Our Team</h2>
        <div class="row">
            <div class="col-md-3" data-aos="flip-left" data-aos-delay="80">
                <div class="team-member text-center">
                    <img src="./830.jpg" class="img-fluid rounded-circle mb-3 small" alt="Team Member 1" />
                    <h5>Team Member 1</h5>
                    <p class="text-muted">Position</p>
                </div>
            </div>
            <div class="col-md-3" data-aos="flip-left" data-aos-delay="100">
                <div class="team-member text-center">
                    <img src="./830.jpg" class="img-fluid rounded-circle mb-3 small" alt="Team Member 2" />
                    <h5>Team Member 2</h5>
                    <p class="text-muted">Position</p>
                </div>
            </div>
            <div class="col-md-3" data-aos="flip-left" data-aos-delay="200">
                <div class="team-member text-center">
                    <img src="./830.jpg" class="img-fluid rounded-circle mb-3 small" alt="Team Member 3" />
                    <h5>Team Member 3</h5>
                    <p class="text-muted">Position</p>
                </div>
            </div>
            <div class="col-md-3" data-aos="flip-left" data-aos-delay="300">
                <div class="team-member text-center">
                    <img src="./830.jpg" class="img-fluid rounded-circle mb-3 small" alt="Team Member 4" />
                    <h5>Team Member 4</h5>
                    <p class="text-muted">Position</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="map" class="map py-5" >
    <div class="container-fluid">
        <h2 class="text-center">Touch With Us</h2>
        <div class="contact-info text-center">
            <p>
                <strong>Phone:</strong> <a href="tel:1234567890" id="phone">123-456-7890</a>
            </p>
            <p>
                <strong>Email:</strong> <a href="mailto:info@example.com" id="email">info@example.com</a>
            </p>
        </div>
        <h4 class="text-center mb-5">Location</h4>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="map-container mb-4" data-aos="zoom-in">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3163.0630301064263!2d-122.08424968469288!3d37.42206577982569!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fb5b1a1b1c3a3%3A0x85b2738bfcf1e40e!2sGoogleplex!5e0!3m2!1sen!2sus!4v1620235417681!5m2!1sen!2sus" 
                        width="100%" 
                        height="550" 
                        style="border:3px solid #5fd7b4;" 
                        allowfullscreen="" 
                        loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="founder" class="founder py-5 bg-light" >
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
</section>

<section id="faq" class="faq py-5">
    <div class="container">
        <h2 class="text-center mb-5">Frequently Asked Questions</h2>
        <div class="accordion" id="faqAccordion">
            <div class="card" data-aos="fade-right" data-aos-delay="100">
                <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link">
                            What types of counseling services do you offer?
                        </button>
                    </h2>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqAccordion">
                    <div class="card-body">
                        We offer a variety of counseling services including individual therapy, couples therapy, family counseling, and group therapy. Our services are designed to help with issues such as anxiety, depression, relationship problems, and more.
                    </div>
                </div>
            </div>
            <div class="card" data-aos="fade-right" data-aos-delay="200">
                <div class="card-header" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed">
                            How do I schedule an appointment?
                        </button>
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                    <div class="card-body">
                        You can schedule an appointment by calling our office at (123) 456-7890, emailing us at contact@counselingcenter.com, or filling out the appointment request form on our website. Our staff will assist you in finding a convenient time for your session.
                    </div>
                </div>
            </div>
            <div class="card" data-aos="fade-right" data-aos-delay="300">
                <div class="card-header" id="headingThree" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed">
                            What should I expect during my first session?
                        </button>
                    </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqAccordion">
                    <div class="card-body">
                        During your first session, your counselor will get to know you and discuss your goals for therapy. This initial session is an opportunity for you to ask questions and determine if the counselor is a good fit for you. You will also discuss confidentiality and therapy policies.
                    </div>
                </div>
            </div>
            <div class="card" data-aos="fade-right" data-aos-delay="400">
                <div class="card-header" id="headingFour" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed">
                            Are your services confidential?
                        </button>
                    </h2>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#faqAccordion">
                    <div class="card-body">
                        Yes, our counseling services are confidential. We adhere to strict confidentiality guidelines to ensure your privacy and trust. Your information will not be shared without your consent, except in cases where we are legally required to do so.
                    </div>
                </div>
            </div>
            <div class="card" data-aos="fade-right" data-aos-delay="500">
                <div class="card-header" id="headingFive" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed">
                            Do you accept insurance?
                        </button>
                    </h2>
                </div>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#faqAccordion">
                    <div class="card-body">
                        Yes, we accept a variety of insurance plans. Please contact our office to verify if your insurance is accepted and to understand the coverage details. We also offer sliding scale fees for clients without insurance.
                    </div>
                </div>
            </div>
            <div class="card" data-aos="fade-right" data-aos-delay="600">
                <div class="card-header" id="headingSix" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed">
                            What are your hours of operation?
                        </button>
                    </h2>
                </div>
                <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#faqAccordion">
                    <div class="card-body">
                        Our hours of operation are Monday to Friday, 9 AM to 7 PM. We also offer weekend appointments upon request. Please contact us to schedule a session that fits your availability.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<footer class="footer mt-5">
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
            <button class="btn btn-outline-success" onclick="window.location.href='./login.php'">Admin</button>
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
