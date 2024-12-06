<?php
include_once './dbCon.php';

$memberName = $_POST['member_name'];
$memberPosition = $_POST['member_position'];
$targetDir = "uploads/";  

$fileExtension = pathinfo($_FILES['member_picture']['name'], PATHINFO_EXTENSION);
$imgFileName = uniqid('', true) . '-' . time() . '.' . $fileExtension;

if (move_uploaded_file($_FILES['member_picture']['tmp_name'], $targetDir . $imgFileName)) {
    $sql = "INSERT INTO tbl_team (name, position, picture) VALUES (?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "<script>alert('Statement preparation failed');</script>";
        header("location: ../settings.php?stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sss", $memberName, $memberPosition, $imgFileName);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    echo "<script>alert('Team member added successfully');</script>";
    header("location: ../settings.php?status=success");
    exit();
} else {
    echo "<script>alert('Error uploading file');</script>";
    header("location: ../settings.php?error=fileUploadFailed");
    exit();
}
