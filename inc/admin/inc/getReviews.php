<?php
include_once './dbCon.php';
$sql = "SELECT a.*, u.firstName, u.lastName 
        FROM tbl_addreview a 
        INNER JOIN tbl_users u ON a.user_id = u.id";
$result = $conn->query($sql);

$reviews = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $reviews[] = $row;
    }
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($reviews);
