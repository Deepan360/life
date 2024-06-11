<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Uploader</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-XXXXXX" crossorigin="anonymous" />

  <style>
        .footer {
            color: white;
            padding: 10px;
            text-align: center;
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
        }
        main .container {
            border: 1px rgb(224, 222, 222);
            box-sizing: border-box;
            box-shadow: 0px 0px 15px 5px rgb(240, 239, 239);
            padding: 20px;
            margin: 10px;
            width: 100%;
            max-width: 600px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        #alerts {
            max-width: 400px; 
            margin: 0 auto; 
            text-align: center;
            align-items: center;
            align-content: center;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand navbar-dark bg-dark">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="/videouploader.php">Uploader</a>
                <a class="nav-item nav-link" href="/videoreapter.php">View</a>
            </div>

            <div class="navbar-nav ms-auto ">
                <button class="btn btn-success" onclick="window.location.href='/index.php'">Sign Out</button>
            </div>
        </nav>
    </header>
    <main>
    <div id="alerts" class="mt-4"></div>
        <div class="container mt-4 border-black">
       
            <div class="title text-success mb-3"><h5>Upload Your Videos</h5></div>
            <form  id="uploadForm" action="uploadVideo.php" method="post">

            <div class="mb-3">
                <label for="topic" class="form-label">Topic</label>
                <input type="text" class="form-control" id="topic" name="topic" required>
            </div>
            <div class="mb-3">
                <label for="videoLink" class="form-label">YouTube Video Link</label>
                <input type="url" class="form-control" id="videoLink" name="videoLink" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="2" required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Upload</button>
        </form>
       
        </div>
       
    </main>
    <footer>
        <div class="footer bg-dark text-white">
            This web page is developed by Akilam Technology 🌏
        </div>
    </footer>
    <script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('uploadForm');
    const alertsDiv = document.getElementById('alerts');

    const storedAlerts = JSON.parse(localStorage.getItem('alerts'));
    if (storedAlerts) {
        showAlert(storedAlerts.type, storedAlerts.message);
        localStorage.removeItem('alerts');
    }

    form.addEventListener('submit', function(event) {
        event.preventDefault(); 

        const formData = new FormData(form);
        fetch(form.action, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                    window.location.reload();
                    showAlert('success', 'Video uploaded successfully!');
             
            } else {
                showAlert('warning', data.message);
            }
        })
        .catch(error => {
            showAlert('danger', 'An error occurred while uploading the video.');
            console.error('Error:', error);
        });
    });

    function showAlert(type, message) {
        alertsDiv.innerHTML = '';

        const alertDiv = document.createElement('div');
        alertDiv.classList.add('alert', `alert-${type}`);
        alertDiv.textContent = message;

        alertsDiv.appendChild(alertDiv);

        localStorage.setItem('alerts', JSON.stringify({ type, message }));

        setTimeout(() => {
            alertDiv.remove();
        }, 2000);
    }
});
</script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
