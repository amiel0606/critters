<?php
session_start();
require_once '../admin/inc/dbCon.php';

$query = "
            SELECT st.*, s.*
            FROM tbl_setappointment st
            INNER JOIN tbl_services s
            ON st.booking_id = s.service_id
            WHERE st.owner_id = ?;
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