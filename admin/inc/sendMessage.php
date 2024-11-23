<?php
include_once './dbCon.php';
session_start();
if (isset($_POST['send_btn_customer'])) {
    $receiver = 'admin';
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';
    $sender = $_SESSION['id'];
    $stmt = $conn->prepare("INSERT INTO tbl_message (receiver, message, sender) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $receiver, $message, $sender);
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Message sent successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to send message.']);
    }
    $stmt->close();
} else {
    $customer_id = isset($_POST['customer_id']) ? intval($_POST['customer_id']) : 0;
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';
    $sender = "admin";
    if ($customer_id > 0 && !empty($message)) {
        $stmt = $conn->prepare("INSERT INTO tbl_message (receiver, message, sender) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $customer_id, $message, $sender);

        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'Message sent successfully.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to send message.']);
        }

        $stmt->close();
    }
}
$conn->close();
