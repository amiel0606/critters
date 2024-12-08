<?php
session_start();
require_once './dbCon.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mission = $_POST['terms_conditions'];


    $stmt = $conn->prepare("UPDATE tbl_cms SET terms = ? WHERE cms_id = 1");
    $stmt->bind_param("s", $mission);
    
    if ($stmt->execute()) {
        echo "
            <script>
                alert('Terms and Condition updated successfully');
                window.location.href = '../settings.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Failed to update Terms and Condition');
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