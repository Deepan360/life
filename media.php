<?php
session_start();
require 'db.php'; 

function extractYouTubeID($url) {
    if (preg_match('/(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $url, $matches)) {
        return $matches[1];
    }
    return false;
}

$query = "SELECT * FROM videos where active = 1";
$result = $conn->query($query);

$videos = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $video_id = extractYouTubeID($row['video_link']);
        if ($video_id) {
            $row['video_link'] = $video_id;
        } else {
            $row['video_link'] = ''; 
        }
        $videos[] = $row;
    }
}

$conn->close();
?>
<!doctype html>
<html lang="en">
    <head>
        <title>Anadhamana Life</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <style>
            body {
                font-family: Arial, sans-serif;
                line-height: 1.6;
                background-color: #f8f9fa;
            }
            .navbar{
                box-shadow: 0px 0px 25px 10px  rgba(0, 0, 0, 0.9) !important;
            }
            .navbar-brand {
                font-size: 1.5rem;
                font-weight: bold;
            }
            .hero-carousel {
                height: 600px;
                background-size: cover;
            }
            .hero-carousel .carousel-item {
                height: 600px;
                background-size: cover;
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
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding: 1rem;
            background-color: #343a40;
            color: #fff;
        }
        .footer-links {
            display: flex;
            flex-direction: column;
        }
        </style>
<style>
    .video-card {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
        margin-bottom: 40px;
    }

    .video-card .video-item {
        width: 100%;
        max-width: 360px;
        padding: 15px;
        border: 1px solid #e0e0e0;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s, box-shadow 0.3s;
        background-color: #ffffff;
        display: flex;
        flex-direction: column;
        overflow: hidden;
    }

    .video-card .video-item:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .video-item .video-container {
        position: relative;
        width: 100%;
        padding-bottom: 56.25%;
        margin-bottom: 15px;
        border-radius: 10px;
        overflow: hidden;
    }

    .video-item .video-container iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        
    }

    .video-item h5 {
        font-size: 1.2rem;
        font-weight: bold;
        margin-bottom: 5px;
        color: #333;
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
    }

    .video-item p {
        font-size: 0.9rem;
        color: #666;
        margin-bottom: 5px;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .video-item .btn {
        align-self: flex-end;
        padding: 10px ;
        border-radius: 5px;
        font-size: 0.9rem;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .video-item .btn:hover {
        background-color: #145c32;
    }

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
        .video-card .video-item {
            max-width: 100%;
        }
    }

    .footer {
        background-color: #333;
        color: white;
        padding: 10px 0;
        text-align: center;
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        font-size: 14px;
    }
</style>

        <style>
            @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
            body {
                font-family: "Roboto", sans-serif;
                line-height: 1.6;
                background-color: #fff;
            }
            .navbar-brand {
                font-size: 1.5rem;
                font-weight: bold;
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
            box-shadow:0px 15px 25px 0px  rgba(0, 0, 0, 0.2);
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
        .card:hover  {
            color:#198754 !important;
            border-bottom-color: #198754 !important;
        }
        .card-title-container {
            background: #fff;
            color: #000;
            padding: 10px;
            position: relative;
            z-index: 1;
        }
        nav{
            font-family: sans-serif;
            background-color: #7bbb4d !important;
            color: white !important;
            width: 100% !important;
            display:  block !important;
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
#about h3{
    font-size: 1.5rem;
    font-weight: bold;
    color: #198754;
}
        /* Base styles for navigation links */
.nav-link {
    color: white !important;
    font-size: 16px;
    padding: 10px 15px;
    border-radius: 5px;
    transition: all 0.3s ease; /* Smooth transition for hover effects */
}

/* Hover styles for navigation links */
.nav-link:hover {
    color: black !important;
    text-decoration: underline;
    background-color: rgba(255, 255, 255, 0.2); /* Subtle background change on hover */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Adding a subtle shadow effect */
}
footer {
    background-color: #333;
    color: white;
    text-align: center;
    padding: 10px 0;
    font-size: 14px;
    position: fixed;
    bottom: 0 !important;
    width: 100%;
}

footer div {
    bottom: 0px;
    margin: 0 auto;
    max-width: 1000px;
    padding: 0 20px;
}


        </style>
    </head>

    <body>
    <nav class="navbar ms-0 navbar-expand-lg bg-success" >
            <div class="container-fluid ">
                <a class="navbar-brand" href="#">Anadhamana Life</a>
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
                            <a class="nav-link" href="./index.php #services">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./index.php #about">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./index.php #contact">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="./media.php">Media</a>
                        </li>
                    </ul>
                    <!-- <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form> -->
                </div>       
            </div>
        </nav>
        <main>
        <div class="container mt-4">
            <div class="video-card text-dark">
                <?php foreach ($videos as $video): ?>
                    <div class="video-item" id="video-<?php echo htmlspecialchars($video['id']); ?>">
                        <div class="video-container">
                            <iframe src="https://www.youtube.com/embed/<?php echo htmlspecialchars($video['video_link']); ?>" allowfullscreen></iframe>
                        </div>
                        <h5><?php echo htmlspecialchars($video['topic']); ?></h5>
                        <p><?php echo htmlspecialchars($video['description']); ?></p>
                        <div style="justify-content: space-between;display:flex;">
                            <a href="https://www.youtube.com/watch?v=<?php echo htmlspecialchars($video['video_link']); ?>" class="btn btn-outline-success" target="_blank">Watch Video</a>
                            <!-- <button class="btn btn-danger delete-video" onclick="deleteVideo(<?php echo $video['id']; ?>)">Delete</button> -->
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div> 
</main>

<footer>
    <div >
        This web page is developed by Akilam Technology 🌏
    </div>
</footer>

        <!-- Bootstrap JavaScript Libraries -->
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
    </body>
</html>
