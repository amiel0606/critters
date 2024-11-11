<?php
session_start();
require_once '../admin/inc/dbCon.php';

$sql = "SELECT r.review, r.rate, u.firstName, u.lastName FROM tbl_addreview r JOIN tbl_users u ON r.user_id = u.id";
$result = $conn->query($sql);

$reviews = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $reviews[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($reviews);

$conn->close();