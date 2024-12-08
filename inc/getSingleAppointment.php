<?php
session_start();
require_once '../admin/inc/dbCon.php';

$ownerId = $_SESSION['id'];
$sql = "SELECT s.*, srv.* 
        FROM tbl_setappointment s
        JOIN tbl_services srv ON s.booking_id = srv.service_id
        WHERE s.owner_id = ? AND s.status = 'Active'
        ORDER BY s.time DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $ownerId);
$stmt->execute();
$result = $stmt->get_result();
$appointments = [];
while ($row = $result->fetch_assoc()) {
    $appointments[] = [
        'title' => $row['service_name'], 
        'start' => $row['booking_date'], 
        'description' => $row['service_description'], 
        'ownerName' => $row['ownerName'], 
        'time' => $row['time'],
        'price' => $row['service_price'], 
        'image' => $row['service_image'], 
        'category' => $row['category_name'] 
    ];
}

echo json_encode($appointments);
$stmt->close();
$conn->close();