<?php
session_start();
require_once '../admin/inc/dbCon.php';
$petId = $_POST['petID']; 
$ownerId = $_SESSION['id'];

$query = "DELETE FROM tbl_pets WHERE id = ? AND owner_ID = ?";
$stmt = mysqli_prepare($conn, $query);

$stmt->bind_param("ii", $petId, $ownerId);


$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo json_encode(array("success" => true));
} else {
    echo json_encode(array("success" => false));
}

$stmt->close();
mysqli_close($conn);