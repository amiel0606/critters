<?php
include_once './dbCon.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['logo']) && $_FILES['logo']['error'] == 0) {
        $targetDir = "uploads/";
        
        $fileExtension = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
        
        $logoFileName = uniqid('', true) . '.' . $fileExtension;
        
        if (move_uploaded_file($_FILES['logo']['tmp_name'], $targetDir . $logoFileName)) {
            $sql = "UPDATE tbl_cms SET logo = ? WHERE cms_id = ?";
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("location: ../settings.php?stmtFailed");
                exit();
            }

            $id = 1; 
            mysqli_stmt_bind_param($stmt, "si", $logoFileName, $id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            header("location: ../settings.php?error=none");
            exit();
        } else {
            header("location: ../settings.php?error=fileUploadFailed");
            exit();
        }
    } else {
        header("location: ../settings.php?error=fileNotUploaded");
        exit();
    }
} else {
    header("location: ../settings.php?error=invalidRequest");
    exit();
}