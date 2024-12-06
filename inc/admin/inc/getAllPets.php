<?php
session_start();
require_once './dbCon.php';

$sql = "SELECT p.*, u.firstName, u.lastName 
        FROM tbl_pets p
        INNER JOIN tbl_users u
        ON p.owner_ID = u.id";
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