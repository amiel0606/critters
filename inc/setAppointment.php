<?php
session_start();

include_once '../admin/inc/dbCon.php';

$ownerName = $_SESSION["firstName"] . " " . $_SESSION["lastName"];
$owner_id = $_SESSION["id"];
$bookingDate = $_POST["book_date"];
$bookingID = $_POST["bookingID"];
$timeSlot = $_POST["time_slot"];

$sql = "INSERT INTO tbl_setAppointment (owner_id, booking_date, ownerName, booking_id, time) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $owner_id, $bookingDate, $ownerName, $bookingID, $timeSlot);
$stmt->execute();

$conn->close();