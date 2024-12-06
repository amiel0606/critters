<?php
include_once './dbCon.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reviewId = $_POST['id'];
    $isVisible = $_POST['visible'] === 'true' ? 'true' : 'false'; 

    $sql = "UPDATE tbl_addreview SET visible = ? WHERE review_id = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo json_encode(['status' => 'error', 'message' => 'SQL statement failed']);
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $isVisible, $reviewId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    echo json_encode(['status' => 'success', 'message' => 'Visibility updated successfully']);
    exit();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
    exit();
}