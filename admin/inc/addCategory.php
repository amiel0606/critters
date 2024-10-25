<?php
include_once 'dbCon.php'; 

$response = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category = isset($_POST['category_name']) ? trim($_POST['category_name']) : '';

    if (empty($category)) {
        $response['status'] = 'error';
        $response['message'] = 'Category name is required.';
    } else {
        $sql = "INSERT INTO tbl_categories(category_name) VALUES (?)";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            $response['status'] = 'error';
            $response['message'] = 'SQL statement preparation failed.';
        } else {
            mysqli_stmt_bind_param($stmt, "s", $category);
            if (mysqli_stmt_execute($stmt)) {
                $response['status'] = 'success';
                $response['message'] = 'Category added successfully.';
            } else {
                $response['status'] = 'error';
                $response['message'] = 'Error executing statement: ' . mysqli_stmt_error($stmt);
            }
            mysqli_stmt_close($stmt);
        }
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'Invalid request method.';
}

header('Content-Type: application/json');
echo json_encode($response);

$conn->close();