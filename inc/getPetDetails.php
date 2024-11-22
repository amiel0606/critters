<?php
require_once '../admin/inc/dbCon.php';

if (isset($_POST['pet_id'])) {
    $petId = intval($_POST['pet_id']); 

    $stmt = $conn->prepare("SELECT * FROM tbl_pets WHERE id = ?");
    $stmt->bind_param("i", $petId);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $pet = $result->fetch_assoc();
            echo json_encode($pet);
        } else {
            echo json_encode(['error' => 'Pet not found']);
        }
    } else {
        echo json_encode(['error' => 'Query execution failed']);
    }

    $stmt->close();
} else {
    echo json_encode(['error' => 'Pet ID not provided']);
}

$conn->close();