<?php
header('Content-Type: application/json');
include_once './dbCon.php';

$categoryId = isset($_POST['edit-category-id']) ? $_POST['edit-category-id'] : null;
$categoryName = isset($_POST['edit-category-name']) ? $_POST['edit-category-name'] : null;

if ($categoryId === null || $categoryName === null) {
    echo json_encode(['error' => 'Invalid input']);
    exit();
}

$stmt = $conn->prepare("UPDATE tbl_categories SET category_name = ? WHERE category_id = ?");
$stmt->bind_param("si", $categoryName, $categoryId);

if ($stmt->execute()) {
    header("location: ./service_offer.php?error=none");
} else {
    header("location: ./service_offer.php?error=FailedToExecute");
}

$stmt->close();
$conn->close();