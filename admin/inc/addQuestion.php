<?php
require_once './dbCon.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $question = trim($_POST['newQuestion']);
    $answer = trim($_POST['newAnswer']);
    if (empty($question) || empty($answer)) {
        die("Question and answer cannot be empty.");
    }
    $sql = "INSERT INTO tbl_chatbot (question, answer) VALUES (?, ?)";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        die("SQL statement failed: " . mysqli_error($conn));
    }
    mysqli_stmt_bind_param($stmt, "ss", $question, $answer);
    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Question added successfully!'); window.location.href = '../admin_chatbot.php?error=success';</script>";
    } else {
        echo "<script>alert('Error adding question.'); window.location.href = '../admin_chatbot.php?error=notPost';</script>";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: ../admin_chatbot.php?error=Faied");
    exit();
}