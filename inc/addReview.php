<?php
session_start();
require_once '../admin/inc/dbCon.php';

if (!isset($_SESSION['id'])) {
    echo json_encode(['status' => 'error', 'message' => 'User  not logged in']);
    exit();
}

$user_id = $_SESSION['id'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $review = isset($_POST['review']) ? trim($_POST['review']) : '';
    $rate = isset($_POST['rate']) ? intval($_POST['rate']) : 0;

    if (empty($review) || $rate < 1 || $rate > 5) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid input']);
        exit();
    }

    $stmt = $conn->prepare("INSERT INTO tbl_addreview (rate, review, user_id) VALUES (?, ?, ?)");
    $stmt->bind_param("isi", $rate, $review, $user_id); 

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Review submitted successfully!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to submit review']);
    }

    $stmt->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
$conn->close();