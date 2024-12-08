<?php
include_once '../admin/inc/dbCon.php'; 

$today = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');

$sql = "SELECT time FROM tbl_setappointment WHERE booking_date = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $today);
$stmt->execute();
$result = $stmt->get_result();

$bookedSlots = [];
while ($row = $result->fetch_assoc()) {
    $bookedSlots[] = $row['time'];
}

$stmt->close();
$conn->close();

echo json_encode($bookedSlots);