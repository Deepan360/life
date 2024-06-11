<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $topic = $_POST['topic'];
    $videoLink = $_POST['videoLink'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("INSERT INTO videos (topic, video_link, description,active) VALUES (?, ?, ?,1)");
    $stmt->bind_param("sss", $topic, $videoLink, $description);

    $success = $stmt->execute(); 

    if ($success) {
        $message = "Video uploaded successfully!";
    } else {
        $message = "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    $response = [
        'success' => $success,
        'message' => $message
    ];

    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
