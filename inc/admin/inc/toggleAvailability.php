<?php
include_once './dbCon.php';

if (isset($_POST['id']) && isset($_POST['is_available'])) {
    $memberId = $_POST['id'];
    $isAvailable = $_POST['is_available'] == 'true' ? 1 : 0;
    echo json_encode(['debug' => true, 'received_id' => $memberId, 'received_is_available' => $isAvailable]);
    $sql = "UPDATE tbl_team SET availability = ? WHERE team_id = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        echo json_encode(['success' => false, 'message' => 'Statement preparation failed']);
        exit();
    }
    $stmt->bind_param("ii", $isAvailable, $memberId);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Availability updated successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error executing statement']);
    }
    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid input', 'received_data' => $_POST]);
}

$conn->close();