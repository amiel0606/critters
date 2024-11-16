<?php
require_once 'dbCon.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM tbl_categories WHERE category_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $sql2 = "DELETE FROM tbl_services WHERE category_id = ?";
    $stmt = $conn->prepare($sql2);
    $stmt->bind_param('i', $id);
    $stmt->execute();
}