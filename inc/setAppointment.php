<?php
session_start();
include_once '../admin/inc/dbCon.php';

$ownerName = $_SESSION["firstName"] . " " . $_SESSION["lastName"];
$owner_id = $_SESSION["id"];
$bookingDate = $_POST["book_date"];
$bookingID = $_POST["bookingID"];
$timeSlot = $_POST["time_slot"];

$checkQuery = "SELECT COUNT(*) as count FROM tbl_setAppointment WHERE booking_date = ?";
$stmt = $conn->prepare($checkQuery);
$stmt->bind_param("s", $bookingDate);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row['count'] >= 10) {
    echo json_encode(['success' => false, 'message' => 'Booking limit reached for this date. Please choose another date.']);
} else {
    $sql = "INSERT INTO tbl_setappointment (owner_id, booking_date, ownerName, booking_id, time) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $owner_id, $bookingDate, $ownerName, $bookingID, $timeSlot);
    $stmt->execute();
    echo json_encode(['success' => true, 'message' => 'Booking was successful']);
}

$conn->close();