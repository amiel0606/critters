<?php
require_once 'dbCon.php';

if (isset($_POST['id']) && isset($_POST['category_name']) && isset($_POST['category_price'])) {
    $id = intval($_POST['id']);
    $categoryName = $_POST['category_name'];
    $categoryPrice = $_POST['category_price'];

    $sql = "UPDATE tbl_categories SET category_name = ?, category_price = ? WHERE category_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssi', $categoryName, $categoryPrice, $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }

    $stmt->close();
}