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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Repeater</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .video-card {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            gap: 20px;
            margin-bottom: 20px;
        }
        .video-card .video-item {
            width: 100%;
            max-width: 360px;
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
        }
        .video-item .video-container {
            position: relative;
            width: 100%;
            padding-bottom: 56.25%; 
            height: 0;
            margin-bottom: 10px;
        }
        .video-item .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 5px;
        }
        .video-item h5 {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            margin-bottom: 5px;
        }
        .video-item p {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            margin-bottom:5px;
        }
        .video-item .btn {
            align-self: flex-end;
        }
        @media screen and (max-width: 1200px) {
            .video-card .video-item {
                max-width: 30%;
            }
        }
        @media screen and (max-width: 992px) {
            .video-card .video-item {
                max-width: 45%;
            }
        }
        @media screen and (max-width: 768px) {
            .video-card .video-item {
                max-width: 100%;
            }
        }
        .footer {
            color: white;
            padding: 10px;
            text-align: center;
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
<header>
    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="/videouploader.php">Uploader</a>
            <a class="nav-item nav-link active" href="/videoreapter.php">View</a>
        </div>
        <div class="navbar-nav ms-auto">
            <button class="btn btn-success" onclick="window.location.href='/index.php'">Sign Out</button>
        </div>
    </nav>
</header> 

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
                            <a href="https://www.youtube.com/watch?v=<?php echo htmlspecialchars($video['video_link']); ?>" class="btn btn-primary" target="_blank">Watch Video</a>
                            <button class="btn btn-danger delete-video" onclick="deleteVideo(<?php echo $video['id']; ?>)">Delete</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
</main>
<footer>
    <div class="footer bg-dark text-white">
        This web page is developed by Akilam Technology 🌏
    </div>
</footer>
<script>
function deleteVideo(videoId) {
    if (confirm('Are you sure you want to delete this video?')) {
        fetch('deletevideo.php', {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id: videoId })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById('video-' + videoId).remove();
                alert('Video successfully deleted.');
            } else {
                alert('Failed to delete the video.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while deleting the video.');
        });
    }
}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

