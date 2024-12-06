<?php
require_once '../admin/inc/dbCon.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pet_id = $_POST['pet_id'];
    $pet_name = $_POST['pet_name'];
    $pet_type = $_POST['pet_type'];
    $pet_img = $_POST['pet_img'];
    $breed = $_POST['breed'];
    $birthdate = $_POST['birthdate'];
    $gender = $_POST['gender'];
    $color = $_POST['color'];
    $uniqueness = $_POST['uniqueness'];

    $stmt = $conn->prepare("UPDATE tbl_pets SET petName = ?, petType = ?, breed = ?, birth_date = ?, gender = ?, color = ?,
    img = ?, uniqueness = ? WHERE id = ?");
    $stmt->bind_param("sssssssi", $pet_name, $pet_type, $breed, $birthdate, $gender, $color, $uniqueness, $pet_id);

    if ($stmt->execute()) {
        header("Location: ../profile.php"); 
        exit();
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();