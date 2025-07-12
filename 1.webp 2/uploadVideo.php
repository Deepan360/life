<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $topic = $_POST['topic'];
    $videoLink = $_POST['videoLink'];
    $description = $_POST['description'];
    $category = $_POST['category']; // Get the category from the form

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO videos (topic, video_link, description, categories, active) VALUES (?, ?, ?, ?, 1)");
    $stmt->bind_param("sssi", $topic, $videoLink, $description, $category);

    // Execute the statement
    $success = $stmt->execute(); 

    // Prepare the response message
    if ($success) {
        $message = "Video uploaded successfully!";
    } else {
        $message = "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    // Send response as JSON
    $response = [
        'success' => $success,
        'message' => $message
    ];

    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
