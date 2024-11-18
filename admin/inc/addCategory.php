<?php
include_once './dbCon.php'; 

$response = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category = isset($_POST['category_name']) ? trim($_POST['category_name']) : '';

    if (empty($category)) {
        header("location: ../service_offer.php?error=InputMissing");
    } else {
        $sql = "INSERT INTO tbl_categories(category_name) VALUES (?)";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            $response['status'] = 'error';
            $response['message'] = 'SQL statement preparation failed.';
        } else {
            mysqli_stmt_bind_param($stmt, "s", $category);
            if (mysqli_stmt_execute($stmt)) {
                header("location: ../service_offer.php?error=none");
            } else {
                header("location: ../service_offer.php?error=FailedToExecute");
            }
            mysqli_stmt_close($stmt);
        }
    }
} else {
    header("location: ../service_offer.php?error=UnknownError");
}

header('Content-Type: application/json');
echo json_encode($response);

$conn->close();