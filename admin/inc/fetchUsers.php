<?php
include_once './dbCon.php';

$sql = "SELECT 
            u.id AS receiver_id, 
            u.firstName, 
            u.lastName, 
            u.username, 
            m.message, 
            MAX(m.timestamp) AS latest_timestamp,
            m.sender,
            m.receiver
        FROM tbl_users u 
        INNER JOIN tbl_message m ON m.sender = u.id 
        WHERE m.status = 'Active' AND m.receiver = 'admin'
        GROUP BY u.id, m.sender
        ORDER BY latest_timestamp DESC";

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
