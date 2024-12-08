<?php
session_start();

require_once 'dbCon.php'; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $firstName = isset($_POST['firstName']) ? trim($_POST['firstName']) : '';
    $lastName = isset($_POST['lastName']) ? trim($_POST['lastName']) : '';
    $accountType = isset($_POST['accountType']) ? trim($_POST['accountType']) : '';
    $password = isset($_POST['pass']) ? trim($_POST['pass']) : '';

    if (empty($username) || empty($firstName) || empty($lastName) || empty($accountType) || empty($password)) {
        $_SESSION['error'] = "All fields are required.";
        header("Location: ../users.php?error=emptyInput");
        exit;
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO tbl_users (username, firstName, lastName, role, password) VALUES (?, ?, ?, ?, ?)";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssss", $username, $firstName, $lastName, $accountType, $hashedPassword);
        
        if ($stmt->execute()) {
            $_SESSION['success'] = "Admin added successfully.";
            header("Location: ../users.php?error=none");
        } else {
            $_SESSION['error'] = "Error adding admin: " . $stmt->error;
            header("Location: ../users.php?error=FailedExecute");
        }

        $stmt->close();
    } else {
        $_SESSION['error'] = "Error preparing statement: " . $conn->error;
        header("Location: ../users.php?error=ErrorParse");
    }
    $conn->close();
} else {
    header("Location: ../users.php?error=stmtFailed");
    exit;
}