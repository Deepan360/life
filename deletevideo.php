<?php
session_start();
require 'db.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "PUT") {
    $data = json_decode(file_get_contents('php://input'), true);
    $videoId = $data['id'] ?? null;

    if ($videoId !== null) {
        // Correct the SQL query syntax
        $stmt = $conn->prepare("UPDATE videos SET active = 0 WHERE id = ?");
        if ($stmt) {
            $stmt->bind_param("i", $videoId);
            $success = $stmt->execute();
            $stmt->close();

            if ($success) {
                echo json_encode(['success' => true]);
                exit;
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to execute SQL statement: ' . $stmt->error]);
                exit;
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to prepare SQL statement: ' . $conn->error]);
            exit;
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Missing video ID.']);
        exit;
    }
}

echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
?>
