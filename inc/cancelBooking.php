<?php
session_start();
require_once '../admin/inc/dbCon.php';

$appointmentId = $_POST['appointmentId'];
$type = $_POST['type'];
if ($type === 'user') {
  $stmt = $conn->prepare("UPDATE tbl_setappointment SET status = 'Cancelled' WHERE appointment_id = ? AND owner_id = ?");
  $stmt->bind_param("ii", $appointmentId, $_SESSION["id"]);

  if ($stmt->execute()) {
    echo "Booking cancelled successfully!";
  } else {
    echo "Error cancelling booking: " . $stmt->error;
  }
} elseif ($type === 'admin') {
  $stmt = $conn->prepare("UPDATE tbl_setappointment SET status = 'Cancelled' WHERE appointment_id = ?");
  $stmt->bind_param("i", $appointmentId);
  if ($stmt->execute()) {
    echo json_encode(['status' => true]);
  } else {
    echo json_encode(['status' => false, 'error' => 'Appointment not found']);
  }
}


$stmt->close();
mysqli_close($conn);