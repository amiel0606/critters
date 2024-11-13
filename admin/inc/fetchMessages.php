<?php
include_once './dbCon.php';
$user_id = isset($_GET['user_id']) ? intval($_GET['user_id']) : 0;
$sql = "SELECT u.id AS customer_id, u.firstName, u.lastName, m.message, m.timestamp 
        FROM tbl_users u 
        INNER JOIN tbl_message m ON m.customer_id = u.id 
        WHERE u.id = $user_id 
        ORDER BY m.timestamp ASC";
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