<?php
include_once './dbCon.php';
$customer_id = isset($_POST['customer_id']) ? intval($_POST['customer_id']) : 0;
$message = isset($_POST['message']) ? trim($_POST['message']) : '';

if ($customer_id > 0 && !empty($message)) {
    $stmt = $conn->prepare("INSERT INTO tbl_message (customer_id, message, created_at) VALUES (?, ?, NOW())");
    $stmt->bind_param("is", $customer_id, $message);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Message sent successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to send message.']);
    }

    $stmt->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid input.']);
}

$conn->close();