<?php
session_start();
header('Content-Type: application/json');
include_once '../admin/inc/dbCon.php';

if (!isset($_SESSION['id'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in']);
    exit;
}

$petId = isset($_POST['petId']) ? intval($_POST['petId']) : 0;
$ownerId = $_SESSION['id'];

if ($petId > 0) {
    $sql = "
SELECT 
    st.appointment_id AS bookingId, 
    st.booking_date, 
    st.status,
    st.endorsed_to,
    s.service_name,
    s.service_price
FROM 
    tbl_setappointment st
INNER JOIN 
    tbl_services s ON st.booking_id = s.service_id
WHERE 
    st.pet_id = ? AND st.owner_id = ?
    ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ii', $petId, $ownerId);
    $stmt->execute();
    $result = $stmt->get_result();

    $history = [];
    while ($row = $result->fetch_assoc()) {
        $history[] = $row;
    }

    $stmt->close();

    if (count($history) > 0) {
        echo json_encode(['success' => true, 'history' => $history]);
    } else {
        echo json_encode(['success' => false, 'message' => 'No history found for this pet']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid pet ID']);
}

$conn->close();
