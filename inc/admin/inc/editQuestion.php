<?php
require_once './dbCon.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id']; 
    $question = mysqli_real_escape_string($conn, $_POST['question']);
    $answer = mysqli_real_escape_string($conn, $_POST['answer']);
    $sql = "UPDATE tbl_chatbot SET question = ?, answer = ? WHERE id = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        die("SQL statement failed: " . mysqli_error($conn));
    }
    mysqli_stmt_bind_param($stmt, "sss", $question, $answer, $id);
    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(['success' => true]);
        echo "<script>alert('Question edited successfully!'); window.location.href = '../admin_chatbot.php?error=success';</script>";
    } else {
        echo json_encode(['success' => false, 'error' => mysqli_error($conn)]);
        echo "<script>alert('Error adding question.'); window.location.href = '../admin_chatbot.php?error=notPost';</script>";
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method.']);
}