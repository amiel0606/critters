<?php
session_start();
require_once '../admin/inc/dbCon.php';

$appointmentId = $_POST['appointmentId'];

$stmt = $conn->prepare("UPDATE tbl_setappointment SET status = 'Cancelled' WHERE appointment_id = ? AND owner_id = ?");
$stmt->bind_param("ii", $appointmentId, $_SESSION["id"]);

if ($stmt->execute()) {
  echo "Booking cancelled successfully!";
} else {
  echo "Error cancelling booking: " . $stmt->error;
}

$stmt->close();
mysqli_close($conn);