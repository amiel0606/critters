<?php
header('Content-Type: application/json');
include_once './dbCon.php';

$sql = "SELECT p.*, u.id, u.username, u.firstName, u.lastName
        FROM tbl_pets p 
        INNER JOIN tbl_users u ON p.owner_ID = u.id"; 
$result = $conn->query($sql);

$users = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}
echo json_encode($users);
$conn->close();