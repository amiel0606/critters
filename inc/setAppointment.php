<?php
session_start();

include_once '../admin/inc/dbCon.php';

$ownerName = $_SESSION["firstName"] . " " . $_SESSION["lastName"];
$petType = $_SESSION["petType"];
$petName = $_SESSION["petName"];
$bookingDate = $_POST["book_date"];
$bookingID = $_POST["bookingID"];

$sql = "INSERT INTO tbl_setAppointment (booking_date, ownerName, petType, petName, booking_id) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $bookingDate, $ownerName, $petType, $petName, $bookingID);
$stmt->execute();

$conn->close();