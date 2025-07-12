<?php
session_start();
require 'db.php'; 

function extractYouTubeID($url) {
    if (preg_match('/(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $url, $matches)) {
        return $matches[1];
    }
    return false;
}

// Fetch categories
$category_query = "SELECT id, category FROM categories"; // Changed 'name' to 'category'
$category_result = $conn->query($category_query);

$categories = [];
if ($category_result) {
    if ($category_result->num_rows > 0) {
        while ($row = $category_result->fetch_assoc()) {
            $categories[$row['id']] = $row['category']; // Store category ID => Name pairs
        }
    }
} else {
    echo "Error fetching categories: " . $conn->error;
}

// Get selected category name from the URL parameter
$selected_category_name = isset($_GET['category']) ? $_GET['category'] : '';

// Build the category condition for the SQL query
$category_condition = '';
if ($selected_category_name !== '') {
    // Escape the category name to prevent SQL injection
    $escaped_category_name = $conn->real_escape_string($selected_category_name);
    $category_condition = "AND c.category = '$escaped_category_name'";
}

// Build the active condition
$active_condition = "AND v.active = 1";

// Build the query based on category selection
if ($selected_category_name === '') {
    // If no category is selected, show all videos with active = 1
    $query = "SELECT v.id, v.topic, v.video_link, v.description, v.upload_time, v.active, c.category
              FROM videos v
              INNER JOIN categories c ON v.categories = c.id
              WHERE v.active = 1";
} else {
    // If a category is selected, filter videos by category and active = 1
    $query = "SELECT v.id, v.topic, v.video_link, v.description, v.upload_time, v.active, c.category
              FROM videos v
              INNER JOIN categories c ON v.categories = c.id
              WHERE v.active = 1 $category_condition";
}

$result = $conn->query($query);

$videos = [];
if ($result) {
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
} else {
    echo "Error fetching videos: " . $conn->error;
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
            gap: 10px;
            margin-bottom: 10px;
        }
        .video-card .video-item {
            width: 100%;
            max-width: 360px;
            margin-bottom: 20px;
            padding: 10px 5px;
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
            margin-bottom: 5px;
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
            margin-bottom: 2px;
        }
        .video-item p {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            margin-bottom: 2px;
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
            background-color: #343a40;
            color: white;
            padding: 10px;
            text-align: center;
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
        }
.filter-form {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
}

.input-group {
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
    width: 100%;
    max-width: 600px;
}

.input-group-text {
    background-color: #007bff;
    color: #fff;
    border: none;
}

.form-select {
    border: none;
    flex: 1;
    width: 400px !important;
}

.btn-cancel {
    background-color: transparent;
    border: none;
    color: #6c757d;
}

.btn-cancel:hover {
    color: #dc3545;
}

@media screen and (max-width: 768px) {
    .form-select {
        width: 300px !important;
    }
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
    <div class="container-fluid mt-4">
        <div class="d-flex justify-content-center mb-3">
            <form id="categoryForm" class="filter-form">
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-filter"></i></span>
                    <select id="categoryFilter" class="form-select" name="category" onchange="document.getElementById('categoryForm').submit()">
                        <option value="">All Categories</option>
                        <?php foreach ($categories as $id => $category): ?>
                            <option value="<?php echo htmlspecialchars($category); ?>" <?php echo $selected_category_name == $category ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($category); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?php if ($selected_category_name !== ''): ?>
                        <button type="button" class="btn btn-cancel" onclick="window.location.href='videoreapter.php'"><i class="bi bi-x-lg"></i></button>
                    <?php endif; ?>
                </div>
            </form>
        </div>
        <div class="video-card text-dark">
            <?php foreach ($videos as $video): ?>
                <div class="video-item" id="video-<?php echo htmlspecialchars($video['id']); ?>">
                    <div class="video-container">
                        <iframe src="https://www.youtube.com/embed/<?php echo htmlspecialchars($video['video_link']); ?>" allowfullscreen></iframe>
                    </div>
                    <h5><?php echo htmlspecialchars($video['topic']); ?></h5>
                    <p><?php echo htmlspecialchars($video['description']); ?></p>
                    <div style="justify-content: space-between; display: flex;">
                        <a href="https://www.youtube.com/watch?v=<?php echo htmlspecialchars($video['video_link']); ?>" class="btn btn-outline-success" target="_blank">Watch Video</a>
                        <button class="btn btn-danger delete-video" onclick="deleteVideo(<?php echo $video['id']; ?>)">Delete</button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>

<footer class="footer">
    This web page is developed by Akilam Technology 🌏
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

document.getElementById('categoryForm').addEventListener('submit', function(e) {
    e.preventDefault();
    var selectedCategory = document.getElementById('categoryFilter').value;
    window.location.href = selectedCategory ? '?category=' + selectedCategory : 'videoreapter.php';
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
</body>
</html>
