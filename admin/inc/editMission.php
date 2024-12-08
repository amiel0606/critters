<?php
session_start();
require_once './dbCon.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mission = $_POST['mission'];
    $vision = $_POST['vision'];

    $stmt = $conn->prepare("UPDATE tbl_cms SET mission = ?, vision = ? WHERE cms_id = 1");
    $stmt->bind_param("ss", $mission, $vision);
    
    if ($stmt->execute()) {
        echo "
            <script>
                alert('Mission and Vision updated successfully');
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Failed to update Mission and Vision');
            </script>
        ";
    }

    $stmt->close();
    mysqli_close($conn);
} else {
    header("Location: ../settings.php");
    exit();
}