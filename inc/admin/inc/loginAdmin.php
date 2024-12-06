<?php
session_start();
include_once './dbCon.php'; 

if (isset($_POST['login'])) {
    $adminUsername = isset($_POST['adminUsername']) ? trim($_POST['adminUsername']) : '';
    $adminPass = isset($_POST['adminPass']) ? trim($_POST['adminPass']) : '';
    $role = isset($_POST['role']) ? trim($_POST['role']) : '';

    if (empty($adminUsername) || empty($adminPass) || $role !== 'Admin') {
        $_SESSION['error'] = "Invalid input. Please try again.";
        header("Location: ../index.php?error=InvalidInput");
        exit();
    }

    $stmt = $conn->prepare("SELECT id, username, password FROM tbl_users WHERE username = ? AND role = ?");
    $stmt->bind_param("ss", $adminUsername, $role);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];

        if (password_verify($adminPass, $hashedPassword)) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $role;

            header("Location: ../admin_dashboard.php");
            exit();
        } else {
            $_SESSION['error'] = "Incorrect password. Please try again.";
        }
    } else {
        $_SESSION['error'] = "No admin account found with the given credentials.";
    }

    $stmt->close();
} else {
    $_SESSION['error'] = "Unauthorized access.";
}

$conn->close();
header("Location: ../index.php?error=InvalidInput");
exit();
