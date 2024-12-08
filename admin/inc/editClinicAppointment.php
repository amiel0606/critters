<?php
session_start();
require_once './dbCon.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $maxAppointments = $_POST['max_appointments'];

    $stmt = $conn->prepare("UPDATE tbl_cms SET max_appointment = ? WHERE cms_id = 1");
    $stmt->bind_param("i", $maxAppointments); 
    
    if ($stmt->execute()) {
        echo "
            <script>
                alert('Maximum appointments updated successfully');
                window.location.href = '../settings.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Failed to update maximum appointments');
                window.location.href = '../settings.php';
            </script>
        ";
    }
    $stmt->close();
    mysqli_close($conn);
} else {
    header("Location: ../settings.php");
    exit();
}