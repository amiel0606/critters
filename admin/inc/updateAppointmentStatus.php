<?php
include_once './dbCon.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $appointmentId = $_POST['id'];
    $endorsedTo = $_POST['endorsedTo'];
    $status = $_POST['status'];
    $sql = "UPDATE tbl_setappointment SET status = ?, endorsed_to = ? WHERE appointment_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $status, $endorsedTo, $appointmentId); 

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => $stmt->error]);
    }

    $stmt->close();
}
$conn->close();