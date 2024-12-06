<?php
include_once './dbCon.php';
$targetDir = "uploads/";
$fileExtension = pathinfo($_FILES['img1']['name'], PATHINFO_EXTENSION);
$img1 = uniqid('', true) . '.' . $fileExtension;
move_uploaded_file($_FILES['img1']['tmp_name'], $targetDir . $img1);
$sql = "INSERT INTO tbl_images(img1) VALUES (?)";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../carousel.php.php?stmtFailed");
    exit();
}

mysqli_stmt_bind_param($stmt, "s", $img1);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

header("location: ../carousel.php?error=none");
exit();