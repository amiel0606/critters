<?php
header('Content-Type: application/json');
include_once './dbCon.php';


$sql = "SELECT id, username, firstName, lastName FROM tbl_users"; 
$result = $conn->query($sql);

$users = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}
echo json_encode($users);
$conn->close();