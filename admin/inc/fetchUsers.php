<?php
include_once './dbCon.php';
$sql = "SELECT u.id, u.firstName, u.lastName, u.username, m.message, m.timestamp, m.sender, m.receiver 
        FROM tbl_users u 
        INNER JOIN tbl_message m ON m.receiver = u.id 
        WHERE m.status = 'Active'
        ORDER BY m.timestamp DESC";
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