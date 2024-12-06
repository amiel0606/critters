<?php
include_once './dbCon.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $visible = $_POST['visible'];

    // Prepare and bind the SQL statement to update visibility
    $sql = "UPDATE tbl_addreview SET visible = ? WHERE review_id = ?";
    $stmt = $conn->prepare($sql);
    
    // Check if the statement was prepared successfully
    if ($stmt === false) {
        echo json_encode(['status' => 'error', 'message' => 'Failed to prepare statement: ' . $conn->error]);
        exit;
    }

    // Bind the parameters: 'i' for integer
    $stmt->bind_param('ii', $visible, $id); // 'ii' means both are integers

    // Execute the statement
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => $stmt->error]);
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>