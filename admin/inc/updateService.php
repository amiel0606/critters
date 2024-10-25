<?php
include_once './dbCon.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $serviceId = $_POST['service_id'];
    $isVisible = $_POST['visible'] === 'true' ? 'true' : 'false'; 

    $stmt = $conn->prepare("UPDATE tbl_services SET visibility = ? WHERE service_id = ?");
    $stmt->bind_param("si", $isVisible, $serviceId); 

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => $stmt->error]);
    }

    $stmt->close();
    $conn->close();
}