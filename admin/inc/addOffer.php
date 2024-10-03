<?php
include_once 'dbCon.php';

$targetDir = "uploads/";
$fileExtension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
$img = uniqid('', true) . '.' . $fileExtension;
move_uploaded_file($_FILES['image']['tmp_name'], $targetDir . $img);

$service_name = $_POST['offer_name'];
$service_description = $_POST['discription_name'];
$sql = "INSERT INTO tbl_services(service_name, service_description, service_image) VALUES (?, ?, ?)";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ./service_offer.php?stmtFailed");
    exit();
}
mysqli_stmt_bind_param($stmt, "sss", $service_name, $service_description, $img);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

header("location: ../service_offer.php?error=none");
exit();