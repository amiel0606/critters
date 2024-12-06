<?php
include_once './dbCon.php';
$sql = "SELECT id, username, firstName, lastName, role FROM tbl_users WHERE role != 'Customer'";
$result = $conn->query($sql);
$messages = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $messages[] = $row;
    }
}
$conn->close();
header('Content-Type: application/json');
echo json_encode($messages);