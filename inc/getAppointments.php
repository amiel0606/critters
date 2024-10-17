<?php
session_start();
require_once '../admin/inc/dbCon.php';

$query = "
            SELECT s.*, b.*
            FROM tbl_setappointment s
            INNER JOIN tbl_bookings b
            ON s.booking_id = b.id
            WHERE s.owner_id = ? AND s.status = 'Active';
";

$stmt = mysqli_prepare($conn, $query);
$stmt->bind_param("i", $_SESSION['id']); 
$stmt->execute();
$result = $stmt->get_result();

$appointments = array();
while ($row = mysqli_fetch_assoc($result)) {
    $appointments[] = $row;
}

$stmt->close();
mysqli_close($conn);

echo json_encode($appointments);